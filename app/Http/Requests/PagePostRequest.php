<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagePostRequest extends FormRequest
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
    public function messages()
    {
        return [
            'img1.max:2048' => 'File Size must be less than 2MB',
        ];
    }

    public function rules()
    {
        return [
            'post_data' =>   'required',
            'title' =>       'required',
            'img1' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' =>   'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
