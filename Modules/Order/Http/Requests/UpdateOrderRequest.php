<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => 'required',
            'grand_total' => 'required',
            'discount' => 'required|numeric|gte:0|max:100',
            'shipping_fee' => 'required|numeric|gte:0|'
            // 'shipping_fee' => 'required|numeric|gte:0|lt:grand_total'

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
