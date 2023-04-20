<?php

namespace Modules\ProductCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'images' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
