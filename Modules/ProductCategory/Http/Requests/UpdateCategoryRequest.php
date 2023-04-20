<?php

namespace Modules\ProductCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('category_products', 'name')->ignore($this->category)
            ],
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'parent_id' => 'nullable'
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

    public function messages()
    {
        return [
            'name.required' => __('Hãy nhập tên danh mục'),
            'name.unique' => __('Tên danh mục phải là duy nhất'),
            'image.mimes' => __('Ảnh định dạng không đúng, Ảnh phải có định dạng: jpg , png,jepg'),
            'image.max' => __('Ảnh được upload không quá 2MB'),
        ];
    }
}
