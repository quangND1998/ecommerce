<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Http\Requests\AtrributeCategoryStoreRequest;
use Modules\ProductCategory\Http\Requests\AtrributeCategoryUpdateRequest;
use Modules\ProductCategory\Repositories\CategoryProductRepository;
use Illuminate\Support\Str;
use Modules\ProductCategory\Http\Requests\AttributeStoreRequest;
use Modules\ProductCategory\Http\Requests\AttributeUpdateRequest;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $allowStoreField = [
        'name', 'category_product_id'

    ];
    protected $cate_product;
    public function __construct(CategoryProductRepository $categoryProductRepository)
    {
        $this->cate_product = $categoryProductRepository;
        $this->middleware('permission:view-category|create-category|update-category|delete-category', ['only' => ['index']]);
        $this->middleware('permission:create-category', ['only' => ['store']]);
        $this->middleware('permission:update-category', ['only' => ['update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    public function index(Request $request, CategoryProductRepository $categoryProductRepository)
    {


        $category = $request->input('category');
        $categories = $categoryProductRepository->category_parents();
        $attributes =  Attribute::with('category_product',)->withCount('values')->whereHas('category_product', function ($q) use ($request) {
            $q->where('name', $request->only('category'));
        })->where(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->term . '%');
        })->paginate(10)->appends(['name' => $request->term, 'category' => $request->category]);


        return Inertia::render('Attributes/Index', compact('attributes',  'categories', 'category'));
    }

    //Get Attributes  by category return json
    public function loadAttributes(Request $request)
    {

        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
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
    public function store(AttributeStoreRequest $request)
    {
        $data = $request->only($this->allowStoreField);
        $attribute = Attribute::create($data);
        $attribute->code = Str::random(8);
        $attribute->slug= Str::slug($request->name,'_');
        $attribute->save();
        return back()->with('success', 'Tạo mới thành công');
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
    public function update(AttributeUpdateRequest $request, Attribute $attribute)
    {
        $data = $request->only($this->allowStoreField);
        $attribute->update($data);
        $attribute->slug= Str::slug($request->name,'_');
        $attribute->save();
        // $attribute->code = Str::random(8);
        // $attribute->save();
        // foreach ($attribute->values as $value) {
        //     $value->update(['name' => $attribute->name]);
        // }
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
