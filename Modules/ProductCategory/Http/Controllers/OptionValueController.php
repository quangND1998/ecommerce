<?php

namespace Modules\ProductCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductCategory\Entities\Options;
use Modules\ProductCategory\Entities\OptionValue;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Http\Requests\Options\OptionValueRequest;
use Modules\ProductCategory\Http\Requests\Options\UpdateOptionValueRequest;
use Modules\ProductCategory\Http\Controllers\VariantTrait;
class OptionValueController extends Controller
{
    use VariantTrait;
    protected $allowStoreField = [
        'value', 'label'
    ];
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Options $option)
    {
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(OptionValueRequest $request, Options $option)
    {
      
        $data= $request->only($this->allowStoreField);
        $option_value = new OptionValue();
        $option_value->value= $request->value;
        $option_value->label= $request->label;
        $option_value->options_id= $option->id;
        $option_value->product_id = $option->product_id;
        $option_value->save();
        $optionValues = [];
        $product = Product::find($option->product_id);
     
        if ($product->optionValues->count() > 1) {
            $previousOptionValues = $product->optionValues
                ->whereNotIn('options_id', $option_value->options_id)
                ->groupBy('options_id')
                ->values()
                ->toArray();
            $optionValues = array_merge($previousOptionValues, [[$option_value->toArray()]]);
        } else {
            $optionValues[] = [$option_value->toArray()];
        }
       
        // generate and save variant
        $variants = $product->generateVariant($optionValues);

     
        $product->saveVariant($variants);
    
        return back()->with('success', 'Create successfully');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateOptionValueRequest $request, OptionValue $option_value)
    {
        
        $data = $request->only($this->allowStoreField);
        $option_value->update($data);
        return back()->with('success', 'Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(OptionValue $value)
    {
     
       $value->delete();
       return back()->with('success','Delete successfully');
    }


}
