<?php

namespace Modules\BlogPage\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:posts,name',
            'sub_title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
