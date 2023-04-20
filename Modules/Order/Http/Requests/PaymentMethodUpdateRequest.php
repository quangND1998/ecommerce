<?php

namespace Modules\Order\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentMethodUpdateRequest extends FormRequest
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
                Rule::unique('payment_methods', 'name')->ignore($this->payment)
            ],
            'thumb' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
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
