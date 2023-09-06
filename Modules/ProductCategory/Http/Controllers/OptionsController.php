<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\ProductCategory\Entities\Options;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Entities\Sku;
use Modules\ProductCategory\Entities\Variants;
use Modules\ProductCategory\Http\Requests\Options\StoreOptionsRequest;
use Modules\ProductCategory\Http\Requests\Options\UpdateOptionsRequest;
use Modules\ProductCategory\Http\Controllers\VariantTrait;

class OptionsController extends Controller
{
    use VariantTrait;
    protected $allowStoreField = [
        'name', 'visual'
    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Product $product)
    {


        $product->load('skus.variants.optionValue');
        $options = Options::with('optionValues')->where('product_id', $product->id)->get();
        return Inertia::render('Options/Index', compact('options', 'product'));
    }

    function gradingStudents($grades)
    {
        // Write your code here
        $array = [];
        foreach ($grades as $grade) {
            $array[] = $this->format($grade);
        }
        return $array;
    }

    function format($grade)
    {
        $floor = ceil(($grade + 5) / 10) * 10;
        return $floor;
        // if ($grade < 38) {

        //     return $grade;
        // }
        // if ($floor == $grade) {
        //     return $grade;
        // } elseif ($floor > $grade) {

        //     if (($floor - $grade) < 3) {

        //         return $floor;
        //     } else {
        //         return $grade;
        //     }
        // }
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
    public function store(StoreOptionsRequest $request, Product $product)
    {

        $data = new Options($request->only($this->allowStoreField));

        $product->options()->save($data);

        $product->skus()->delete();
        // generate and save variant
        $optionValues = $product->optionValues->groupBy('option_id')->values()->toArray();
        $variants = $product->generateVariant($optionValues);


        $product->saveVariant($variants);
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
    public function update(UpdateOptionsRequest $request, Options $option)
    {
        $data = $request->only($this->allowStoreField);
        $option->update($data);
        return back()->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Options $option)
    {
        $option->optionValues()->delete();
        $option->delete();
        return back()->with('success', 'Delete successfully');
    }
}
