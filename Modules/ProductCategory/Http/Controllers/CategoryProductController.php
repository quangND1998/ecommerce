<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Http\Requests\CreateCategoryRequest;
use Modules\ProductCategory\Repositories\CategoryProductRepository;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Traits\FileUploadTrait;
use Modules\ProductCategory\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
    use FileUploadTrait;
    protected $allowStoreField = [
        'name', 'image', 'parent_id'

    ];
    protected $category;
    public function __construct(CategoryProductRepository $categoryProductRepository)
    {
        $this->category = $categoryProductRepository;
        $this->middleware('permission:view-category|create-category|update-category|delete-category', ['only' => ['index']]);
        $this->middleware('permission:create-category', ['only' => ['store']]);
        $this->middleware('permission:update-category', ['only' => ['update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = $this->category->get();
        return Inertia::render('CategoryProduct/Index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('productcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCategoryRequest $request)
    {


        $category = CategoryProduct::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'image' => $request->file('image') ? $this->uploadImageResize($request->file('image'), 32, 32) : null,
            'parent_id' => $request->parent_id
        ]);
        return back()->with('success', 'Tạo mới danh mục thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('productcategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('productcategory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCategoryRequest $request, CategoryProduct $category)
    {

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'image' => $request->file('image') ? $this->updateImageResize($request->file('image'), 32, 32, $category->image) : $category->image,
            'parent_id' => $request->parent_id
        ]);
        return back()->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(CategoryProduct $category)
    {

        foreach ($category->childrenCategories as $cate) {
            $this->deleteImage($cate->image);
            $cate->delete();
        }
        $this->deleteImage($category->image);

        $category->delete();
        return back()->with('success', 'Xóa danh mục thành công');
    }
}
