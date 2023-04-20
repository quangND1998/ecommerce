<?php

namespace Modules\ProductCategory\Http\Controllers;

use App\Exports\ExportProducts;
use App\Exports\ProductExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\AttributeCategory;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Entities\ProductPrice;
use Modules\ProductCategory\Http\Requests\CreateProductRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Entities\ProductAttribute;
use Modules\ProductCategory\Entities\ProductImages;
use Modules\ProductCategory\Http\Requests\UpdateProductRequest;
use App\Imports\ImportProduct;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use FileUploadTrait;
    protected $allowStoreField = [
        'name',
        'description',
        'SKU',
        'status',
        'auto_sold',
        'price',
        'cost',
        'quantity_sold',
        'category_id'

    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $parent_categories = CategoryProduct::whereNull('parent_id')->get();

        if (count($parent_categories) > 0) {
            $productCount = Product::count();
            return redirect()->route('warehouse.show', $parent_categories[0]->slug);
            return Inertia::render('Product/Layout', compact('parent_categories', 'productCount'));
        } else {
            return redirect('/admin/category')->with('warning', 'Tạo danh mục sản phẩm trước khi vào kho hàng');
        }
    }



    public function saveCost(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $request->validate([
            'product_cost' => 'required|numeric|gt:0',
            'product_sku'       =>  'required|unique:products,SKU,' . $product->id,
            'product_price'       =>  'required|numeric|gt:0'

        ]);

        // $product = Product::findOrFail($request->id);
        // return $product;

        $product->update([
            'cost' => $request->product_cost,
            'SKU' => $request->product_sku,
            'price' => $request->product_price
        ]);
        return response()->json($product->load(['category', 'first_image', 'attributes']), Response::HTTP_OK);
    }




    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($slug)
    {
        $category = CategoryProduct::with('attributes.values')->where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        // $attributes = $category->attributes;
        $categories = CategoryProduct::where('parent_id', $category->id)->get()->push($category);


        return Inertia::render('Product/AddProduct', compact('category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateProductRequest $request)
    {


        $data = $request->only($this->allowStoreField);
        $product = Product::create($data);


        $middlepath = 'product/images';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }

        if ($request->file('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                ProductImages::create([
                    'name' => time() . $key,
                    'image' => $this->upload($image, time() . $key, $middlepath),
                    'product_id' => $product->id
                ]);
            }
        }

        // $values = AttributeValue::with('attribute')->whereIn('id', $request->arrayValues)->get();
        // if (count($values) > 0) {
        //     $product->values()->sync($values);
        // }

        $category = CategoryProduct::with('category')->findOrFail($request->category_id);
        if ($category->parent_id) {
            return redirect()->route('warehouse.show', $category->category->slug)->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('warehouse.show', $category->slug)->with('success', 'Cập nhật thành công');
        }


        return back()->with('success', 'Tạo mới thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, $slug)
    {
        $sortBy = $request->sortBy ? $request->sortBy : 'id';
        $sort_Direction = $request->sortDirection ?  $request->sortDirection : 'asc';
        $status = $request->status;

        /** Lấy dữ liệu category product ko có parent_id*/
        $parent_categories = CategoryProduct::whereNull('parent_id')->get();
        if (count($parent_categories) > 0) {
            /**  Lấy tổng số sản phẩm*/
            $productCount = Product::count();
            /**Lấy category bằng slug*/
            $category = CategoryProduct::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $categories = CategoryProduct::where('parent_id', $category->id)->get();
            $array = $categories->push($category)->pluck('id');
            /**Lấy product bằng array id của category*/
            $products = Product::select('id', 'name', 'slug', 'SKU', 'status', 'active', 'auto_sold', 'price', 'cost', 'outstanding', 'category_id')->with(['category', 'first_image', 'values'])->filter($request->only('status'))->whereIn('category_id', $array)->where(function ($query) use ($request) {
                $query->where('SKU', 'LIKE', '%' . $request->term . '%');
            })->orderBy($sortBy, $sort_Direction)->paginate(15)->appends(['name' => $request->term, 'sortBy' => $request->sortBy, 'sortDirection' => $request->sort_Direction, 'status' => $request->status]);;

            return Inertia::render('Product/Product', compact('parent_categories', 'productCount', 'category', 'products', 'sortBy', 'sort_Direction', 'status'));


            /************ 
             * 
             * 
             * 
             * 
             * Cách này query lấy value
             * 
             * ************/
            $products = Product::select('id', 'name', 'slug', 'SKU', 'status', 'active', 'auto_sold', 'price', 'cost', 'outstanding', 'category_id')->with(['values.attribute'])
                ->whereHas('values', function ($q) use ($request) {
                    $q->where('value', ['B', '5', '20', '10', '15', '2 Mặt nâu']);
                })->whereHas('values.attribute', function ($q) use ($request) {
                    $q->where('name', ['Sóng giấy', 'Số lớp', 'Chiều dài ( cm )', 'Chiều rộng ( cm )', 'Chiều cao ( cm )', 'Mặt giấy']);
                })->whereIn('category_id', $array)->get();

            /************ 
             * 
             * 
             * 
             * 
             * Cách này query bằng mã code với value 
             * 
             * ************/
            // $array_request = [
            //     ['code' =>'b3V1zd8F',
            //     'value' => 15],
            //     ['code' =>'9rXIKmdc',
            //     'value' => 10],

            //     ['code' =>'Nvajlma8',
            //     'value' => 5],

            // ];
            // $value_id= [];
            // foreach($array_request as $arr){
            //     $value = AttributeValue::whereHas('attribute', function($q) use ($arr){
            //         $q->where('code',$arr['code']);
            //     })->where('value', $arr['value'])->first();

            //     if($value){
            //         $value_id[]= $value->id;
            //     }
            // }
            //  $products = Product::select('id', 'name', 'slug', 'SKU', 'status', 'active', 'auto_sold', 'price', 'cost', 'outstanding', 'category_id')->with(['values.attribute'])
            // ->whereHas('values',function($q) use($value_id){
            //     $q->where('value_id',$value_id);

            //  })->whereIn('category_id', $array)->get();
            // return $products;
        } else {
            return redirect('/admin/category')->with('warning', 'Tạo danh mục sản phẩm trước khi vào kho hàng');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($slug, Product $product)
    {
        // $product = Product::whereHas('sale_items.sale', function($q){
        //     $q->where('state', 'running');
        // })->with('sale_items')->find($product->id);
        // return $product;
        $product = $product->load('images', 'attributes', 'category', 'values.attribute', 'sale_items');
        $category = CategoryProduct::with('attributes.values')->where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }
        $categories = CategoryProduct::where('parent_id', $category->id)->get()->push($category);
        $attributes = $category->attributes;
        // return $attributeCategories;
        return Inertia::render('Product/EditProduct', compact('product', 'categories', 'category', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $data = $request->only($this->allowStoreField);
        $product->update($data);

        $values = AttributeValue::with('attribute')->whereIn('id', $request->arrayValues)->get();
        if (count($values) > 0) {
            $product->values()->sync($values);
        }

        $category = CategoryProduct::with('category')->findOrFail($request->category_id);
        if ($category->parent_id) {
            return redirect()->route('warehouse.show', $category->category->slug)->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('warehouse.show', $category->slug)->with('success', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product)
    {

        foreach ($product->images as $image) {
            unlink($image->image);
        }
        $product->delete();
        return back()->with('success', 'Xóa thành công');
    }


    public function attributes($slug, Product $product)
    {
        $product = $product->load('images', 'attributes', 'category');
        $category = CategoryProduct::with('attributes')->where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        $attributes = $category->attributes;

        return Inertia::render('Product/Attributes', compact('product', 'category', 'attributes'));
    }








    // public function saveAttribute(SaveAttributeRequest $request, Product $product)
    // {
    //     $attribute = Attribute::findOrFail($request->attribute_id);
    //     $exists = DB::table('product_attributes')->where('product_id', $product->id)->where('attribute_id', $attribute->id);
    //     if ($exists->count() > 0) {
    //         return back()->with('warning', 'Không thêm được thuộc tính lần nữa');
    //     }
    //     $product->attributes()->attach($attribute);
    //     return back()->with('success', 'Cập nhật thành công');
    // }


    // public function deleteAttribute(SaveAttributeRequest $request, Product $product)
    // {
    //     $attribute = Attribute::findOrFail($request->attribute_id);
    //     $exists = DB::table('product_attributes')->where('product_id', $product->id)->where('attribute_id', $attribute->id);
    //     if ($exists->count() > 0) {
    //         return back()->with('warning', 'Không thêm được thuộc tính lần nữa');
    //     }
    //     $product->attributes()->attach($attribute);
    //     return back()->with('success', 'Cập nhật thành công');
    // }


    public function changeStatus(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $product->update(['status' => $request->status]);
        return back()->with('success', 'Cập nhật thành công');
    }


    public function changeActive(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $product->update(['active' => $request->active]);
        return back()->with('success', 'Cập nhật thành công');
    }

    public function changeOutstanding(Request $request)
    {

        $product = Product::findOrFail($request->id);
        $product->update(['outstanding' =>  $request->outstanding]);
        return back()->with('success', 'Cập nhật thành công');
    }

    public function DeleteProducts(Request $request)
    {
        $ids = $request->ids;
        if ($ids == null) {
            return back()->with('warning', "You must choose in checkbox !!!.");
        }

        $products = Product::with('images')->whereIn('id',  $ids)->get();
        if ($products->count() > 0) {
            foreach ($products as $product) {

                foreach ($product->images as $image) {
                    unlink($image->image);
                }
                $product->delete();
            }

            return back()->with('success', "Delete changed successfully.");
        }
        return back()->with('warning', "Not found product");
    }


    public function importProduct(Request $request)
    {

        $request->validate([
            'product_file' => 'required|mimes:xlsx,csv,xls'
        ]);
        Excel::import(new ImportProduct, request()->file('product_file'));
        File::deleteDirectory('/storage/framework/laravel-excel/*');
        return redirect()->back()->with('success', 'Đang xử lý');
    }


    public function export()
    {
        $attributes = Attribute::pluck('name')->toArray();

        array_unshift($attributes, 'SKU', 'Tên sản phẩm', "Danh mục sản phẩm", "Giá bán", "Giá gốc");

        return Excel::download(new ExportProducts($attributes), 'product.xlsx');
    }

    public function exportbyCategory($slug)
    {
        $category = CategoryProduct::where('slug', $slug)->first();
        $categories = CategoryProduct::where('parent_id', $category->id)->get();
        $array = $categories->push($category)->pluck('id');


        if ($category) {
            $attributes = $category->attributes->pluck('name')->toArray();

            array_unshift($attributes, 'SKU', 'Tên sản phẩm', "Danh mục sản phẩm", "Giá bán", "Giá gốc");
            // (new ProductExport($attributes, $array))->store($category->slug.'-product.xlsx');
            // $path = storage_path().'/'.'app'.'/'.$category->slug.'-product.xlsx';
            // if (file_exists($path)) {
            //     return response()->download($path);

            // }
            // return back()->withSuccess('Export started!');
            return Excel::download(new ProductExport($attributes, $array), $category->slug . '-product.xlsx');
        } else {
            abort(404);
        }
    }
}
