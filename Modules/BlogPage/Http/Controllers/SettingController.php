<?php

namespace Modules\BlogPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\BlogPage\Entities\Setting;
use Modules\BlogPage\Http\Requests\SettingRequest;

class SettingController extends Controller
{


    protected $allowStoreField = [
        "company_name", "address",    "email",    "tax_code",    "hotline", "zalo_phone",    "facebook",    "map"

    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $setting = Setting::first();
        return Inertia::render("Setting/Setting", compact('setting'));
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
    public function store(SettingRequest $request)
    {
        $settings = Setting::get();
        if ($settings->count() == 0) {
            $data = $request->only($this->allowStoreField);
            Setting::create($data);
        } else {
            $setting = Setting::find(1);
            $data = $request->only($this->allowStoreField);
            $setting->update($data);
        }
        return redirect('/admin/setting')->with('success', 'Lưu thành công');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
