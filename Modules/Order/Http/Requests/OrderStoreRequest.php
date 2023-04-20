<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'payment_method' => 'required',
            // 'specific_address' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'wards' => 'required',
            'phone_number' => 'required',
            'notes' => 'nullable',
            'email' => 'nullable'

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
            'name.required' => __('Hãy nhập Tên khách hàng'),
            'payment_method.required' => __('Hãy chọn phương thức thanh toán'),
            // 'specific_address.required' => __('Hãy nhập địa chỉ cụ thể'),
            'address.required' => __('Hãy nhập địa chỉ cụ thể'),
            'city.required' => __('Hãy chọn Thành phố'),
            'district.required' => __('Hãy chọn Quận/Huyện ship hàng'),
            'wards.required' => __('Hãy chọn Phường/Xa ship hàng'),
            'phone_number.required' => __('Hãy nhập số điện thoại để chúng tôi liên hệ sau khi đặt hàng'),
            // 'email.required' => __('Hãy nhập email chúng tôi sẽ gửi thông tin đơn hàng đến bạn'),
        ];
    }
}
