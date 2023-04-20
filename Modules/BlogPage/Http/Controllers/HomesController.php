<?php

namespace Modules\BlogPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Modules\BlogPage\Entities\Home;
use App\Http\Controllers\Traits\FileUploadTrait;

class HomesController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $homes = Home::orderBy('priority', 'asc')->get();
        return Inertia::render('Setting/Home', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blogpage::create');
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
        $request->validate([
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);
        Home::create([
            'link' => $request->link,
            'image' => $request->file('image') ? $this->upload($request->file('image'), time(), $middlepath) : null,

        ]);
        return back()->with('success', 'Lưu  thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blogpage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blogpage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Home $home)
    {
        $middlepath = 'setting';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $request->validate([
            'link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);
        $home->update([
            'link' => $request->link,
            'image' => $request->file('image') ? $this->updateImage($request->file('image'), time(), $middlepath, $home->image) : $home->image,

        ]);
        return back()->with('success', 'Lưu  thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Home $home)
    {
        $this->deleteImage($home->image);
        $home->delete();
        return back()->with('success', 'Xóa  thành công');
    }

    public function changeActive(Request $request)
    {

        $home = Home::findOrFail($request->id);
        $home->update(['state' => $request->state]);
        return back()->with('success', 'Cập nhật thành công');
    }

    public function priority(Request $request)
    {

        $data = $request->data;
        for ($i = 0; $i < count($data); $i++) {
            Home::findOrFail($data[$i]['id'])->update(['priority' => $i]);
        }
        return redirect()->back()->with('success', 'Sort  successfully');
    }
}
