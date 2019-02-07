<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodItemRequest extends FormRequest
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
            'food_name' => 'required',
            'cat_name' => 'required',
            'price' => 'required',
            'food_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
