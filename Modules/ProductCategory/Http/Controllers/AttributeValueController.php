<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\AttributeCategory;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Http\Requests\StoreAtrributeRequest;
use Modules\ProductCategory\Http\Requests\StoreAttributeValueRequest;
use Modules\ProductCategory\Http\Requests\UpdateAtrributeRequest;
use Modules\ProductCategory\Http\Requests\UpdateAttributeValueRequest;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $allowStoreField = [
        'attribute_id'

    ];

    public function __construct()
    {
        $this->middleware('permission:view-category|create-category|update-category|delete-category', ['only' => ['index']]);
        $this->middleware('permission:create-category', ['only' => ['store']]);
        $this->middleware('permission:update-category', ['only' => ['update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }
    public function index(Request $request,Attribute $attribute)
    {
        $values =  AttributeValue::with('attribute')->where('attribute_id', $attribute->id)->where(function ($query) use ($request) {
            $query->where('value', 'LIKE', '%' . $request->term . '%');
        })->paginate(15);
       

     
        return Inertia::render('Attributes/AttributeValues',compact('values','attribute'));

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
    public function store(StoreAttributeValueRequest $request,Attribute $attribute )
    {
        
        $attribute_value = AttributeValue::create([
            'value' => $request->value,
            'attribute_id' => $attribute->id
        ]);
        return back()->with('success', 'Tạo thuộc tính thành công');
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
    public function update(UpdateAttributeValueRequest $request, AttributeValue $attribute_value)
    {
    
        $attribute_value->update([
            'value' => $request->value,
           
        ]);
        // $productAttributes = $attribute_value->load('productAttributes');
        // return $productAttributes;
        return back()->with('success', 'Cập nhật thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(AttributeValue $attribute_value)
    {
        $attribute_value->delete();
        return back()->with('success', 'Xóa thuộc tính thành công');
    }
}
