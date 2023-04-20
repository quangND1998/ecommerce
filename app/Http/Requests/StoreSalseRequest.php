<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  'required|unique:sales,name',
            'type' => 'required',
            'unit' => 'required',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' =>  'required|date|after:start_date',
            'discount' => ['required_if:type,==,all', 'nullable', 'gt:0']

        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Hãy nhập chương trình sale'),
            'name.unique' => __('Tên  chương trình sale này đã được tạo rồi'),
            'type.required' => __('Chọn loại triết khẩu cho chương trình sale'),
            'start_date.required' => __('Ngày bắt đầu chương trình phải lớn hơn ngày mai'),
            'end_date.required' => __('Ngày kết thúc chường trình phải lớn hơn ngày bắt đầu'),
            'required_if:type,==,all' => __('Triết khấu không được trống nếu chọn sale cho toàn bộ chương trình'),
            'discount.numeric' => __('Triết khẩu phải là số'),
            'discount.gte:0' => __('Triết khẩu phải là số lớn hơn hoặc bằng 0'),
            'discount.lte:100' => __('Triết khẩu phải là số nhỏ hơn hoặc bằng 100'),


        ];
    }
}
