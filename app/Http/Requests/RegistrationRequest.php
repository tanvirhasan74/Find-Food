<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'username' =>       'required|min:4|unique:users,username',
            'fullname' =>       'required',
            'pass1' =>          'required|min:5|same:pass2',
            'email' =>          'required|email|unique:users,email',
            'profilePic' =>     'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area' =>           'required',
        ];
    }
}
