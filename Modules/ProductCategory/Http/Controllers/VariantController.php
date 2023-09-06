<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\ProductCategory\Entities\Sku;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('productcategory::index');
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
    public function store(Request $request)
    {
       
        $request->validate([
            
            'skus.*.name' => 'nullable|string',
            'skus.*.price' => 'required|numeric',
            'skus.*.barcode' => 'nullable|string',
            'skus.*.stock' => 'required|numeric',
        ]);
        foreach($request->skus as $index => $sku){

            $request->validate([
                "skus.$index.name" => ['nullable', 'string', Rule::unique('skus', 'name')->ignore($sku['id'])],
                "skus.$index.barcode" => ['nullable', 'string', Rule::unique('skus', 'barcode')->ignore($sku['id'])],
            ], [
                "skus.$index.name.unique" => 'Duplicated.',
                "skus.$index.barcode.unique" => 'Duplicated.'
            ]);
            $sku = Sku::find($sku['id'])->update([
                'name' => $sku['name'],
                'price' => $sku['price'],
                'barcode' => $sku['barcode'],
                'stock' => $sku['stock'],
            ]);
        }
        return back()->with('success', 'Update successfully');
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

    public function deleteSku($id)
    {
        $sku = Sku::findOrFail($id);
        $sku->delete();
        return back()->with('success', 'Update successfully');
    }

    
}
