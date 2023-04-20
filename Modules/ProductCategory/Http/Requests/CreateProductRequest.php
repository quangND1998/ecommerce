<?php

namespace Modules\ProductCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name'      =>  'required|max:255|unique:products,name',
            // 'SKU'       =>  'required|unique:products,SKU',
            'description' => 'required',
            'price'     =>  'required|regex:/^\d+(\.\d{1,9})?/|numeric|gt:0',
            'cost'     =>  'regex:/^\d+(\.\d{1,9})?/|numeric|gt:0',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' =>'required',
            'auto_sold'=> 'required|boolean',
            'quantity_sold' => 'required_if:auto_sold,false',
            
            'category_id' => 'required'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
