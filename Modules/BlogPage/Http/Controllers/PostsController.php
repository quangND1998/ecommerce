<?php

namespace Modules\BlogPage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\BlogPage\Entities\Post;
use Modules\BlogPage\Http\Requests\Post\PostStoreRequest;
use Modules\BlogPage\Http\Requests\Post\PostUpdateRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Modules\BlogPage\Entities\Tag;
use Modules\ProductCategory\Entities\Product;

class PostsController extends Controller
{
    use FileUploadTrait;
    protected $allowStoreField = [
        "name",  "sub_title",  "description"
    ];

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $sortBy = $request->sortBy ? $request->sortBy : 'id';
        $sort_Direction = $request->sortDirection ?  $request->sortDirection : 'asc';
        $active = $request->active;

        $posts = Post::select('id', 'name', 'slug', 'url', 'state', 'outstanding', 'image', 'post_time', 'created_at', 'updated_at')->with('tags')->filter($request->only('active'))->where(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->term . '%');
        })->orderBy($sortBy, $sort_Direction)->paginate(15)->appends(['name' => $request->term, 'sortBy' => $request->sortBy, 'sortDirection' => $request->sort_Direction, 'active' => $request->active]);;
        return Inertia::render('Blog/Index', compact('posts',  'sortBy', 'sort_Direction', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $tags = Tag::get();
        return Inertia::render('Blog/AddPost', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostStoreRequest $request)
    {

        $middlepath = 'blog/images';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $data = $request->only($this->allowStoreField);
        $post = Post::create($data);
        $post->image =  $this->upload($request->file('image'), time(), $middlepath);

        $list_tags = Tag::find($request->tags);
        $post->tags()->sync($list_tags);
        $post->save();

        return redirect('/admin/posts')->with('success', 'Tạo mới thành công');
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
    public function edit(Post $post)
    {
        $tags = Tag::get();
        $post->load('tags');
        return Inertia::render('Blog/EditPost', compact('tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostUpdateRequest $request, Post $post)
    {


        $middlepath = 'blog/images';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $data = $request->only($this->allowStoreField);
        $post->update($data);
        $post->image =  $request->file('image') ? $this->updateImage($request->file('image'), time(), $middlepath, $post->image) : $post->image;
        $post->save();
        $list_tags = Tag::find($request->tags);
        $post->tags()->sync($list_tags);
        return redirect('/admin/posts')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post)
    {
        $this->deleteImage($post->image);
        $post->delete();
        return back()->with('success', 'Xóa thành công thành công');
    }


    public function changeState(Request $request)
    {

        $post = Post::findOrFail($request->id);
        $post->update(['state' => $request->state]);
        if ($post->state == 1) {
            $post->post_time = Carbon::now();
            $post->save();
        }
        return back()->with('success', 'Cập nhật thành công');
    }


    public function changeOutstanding(Request $request)
    {

        $post = Post::findOrFail($request->id);
        $post->update(['outstanding' =>  $request->outstanding]);
        return back()->with('success', 'Cập nhật thành công');
    }

    public function deletePosts(Request $request)
    {
        $ids = $request->ids;
        if ($ids == null) {
            return back()->with('warning', "You must choose in checkbox !!!.");
        }

        $posts = Post::with('images')->whereIn('id',  $ids)->get();
        if ($posts->count() > 0) {
            foreach ($posts as $post) {

                unlink($post->image);

                $post->delete();
            }

            return back()->with('success', "Delete changed successfully.");
        }
        return back()->with('warning', "Not found product");
    }
}
