<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\ProductImages;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Http\Requests\StoreImageRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Http\Requests\UpdateImageRequest;

class ProductImageController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($slug, Product $product)
    {
        $product->load('images');
        $category = CategoryProduct::with('attributes.values')->where('slug', $slug)->first();
        if ($category) {
            return Inertia::render('Product/Images', compact('product', 'category'));
        } else {
            abort(404);
        }
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
    public function store(StoreImageRequest $request, Product $product)
    {

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
        return back()->with('success', 'Create successfully');
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
    public function update(UpdateImageRequest $request, ProductImages $image)
    {
        $middlepath = 'product/images';
        $path = public_path($middlepath);
        if (!Storage::exists($path)) {

            Storage::makeDirectory($path, 0777, true, true);
        }
        $image->update([
            'image' => $request->file('images') ? $this->updateImage($request->file('images'), time(), $middlepath, $image->image) : $image->image,
        ]);

        return back()->with('success', 'Create successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ProductImages $image)
    {
        $this->deleteImage($image->image);

        $image->delete();
        return back()->with('success', 'Xóa Ảnh thành công');
    }


    public function priority(Request $request)
    {

        $data = $request->data;
        for ($i = 0; $i < count($data); $i++) {
            ProductImages::findOrFail($data[$i]['id'])->update(['priority' => $i]);
        }
        return redirect()->back()->with('success', 'Sort  successfully');
    }
}
