<?php

namespace Modules\ProductCategory\Http\Requests\Options;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OptionValueRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => ['required', Rule::unique('option_values', 'value')->where('options_id', $this->option->id)],
            'label' => 'nullable',

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
