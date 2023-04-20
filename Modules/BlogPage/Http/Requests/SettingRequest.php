<?php

namespace Modules\BlogPage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'tax_code' => 'nullable',
            'hotline' => 'required',
            'zalo_phone' => 'nullable',
            'facebook' => 'nullable',
            'map' => 'nullable'
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
