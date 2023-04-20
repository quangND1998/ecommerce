<?php

namespace Modules\BlogPage\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
                Rule::unique('posts', 'name')->ignore($this->post)
            ],
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
