<?php

namespace Modules\Order\Http\Requests\ShippingFee;

use Illuminate\Foundation\Http\FormRequest;

class StoreShippingFeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'fee' =>  'required|numeric|gt:-1|max:100',
            'start_price' => 'required|numeric|gt:0|max:10000000000',
            'end_price' => 'required|numeric|gt:start_price|max:10000000000',
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
