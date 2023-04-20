<?php

namespace Modules\BlogPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\BlogPage\Entities\Tag;
use Modules\BlogPage\Http\Requests\Tag\TageStoreRequest;
use Modules\BlogPage\Http\Requests\Tag\TageUpdateRequest;

class TagController extends Controller
{
    protected $allowStoreField = [
        'name', 'slug'

    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return Inertia::render('Blog/Tag', ['tags' => Tag::get()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(TageStoreRequest $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TageUpdateRequest $request)
    {
        $data = $request->only($this->allowStoreField);
        Tag::create($data);
        return back()->with('success', 'Tạo mới thành công');
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
    public function update(Request $request, Tag $tag)
    {
        $data = $request->only($this->allowStoreField);
        $tag->update($data);
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Xóa thành công thành công');
    }
}
