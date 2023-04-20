<?php

namespace Modules\BlogPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BlogPage\Entities\AboutUs;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use IntlChar;

class AboutUsController extends Controller
{
    use FileUploadTrait;
    protected $allowStoreField = [
        "description"

    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $about_us = AboutUs::first();
        return Inertia::render("Setting/AboutUs", compact('about_us'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $middlepath = 'setting';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $about_us = AboutUs::get();
        if ($about_us->count() == 0) {
            $request->validate([
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            AboutUs::create([
                'description' => $request->description,
                'image' => $request->file('image') ? $this->upload($request->file('image'), time(), $middlepath) : null,

            ]);
        } else {
            $request->validate([
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $about_us = AboutUs::find(1);
            $about_us->update([
                'description' => $request->description,
                'image' => $request->file('image') ? $this->updateImage($request->file('image'), time(), $middlepath, $about_us->image) : $about_us->image,

            ]);
        }
        return back()->with('success', 'Lưu  thành công');
    }
}
