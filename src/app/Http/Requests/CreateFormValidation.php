<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormValidation extends FormRequest
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
            'nickname' => 'required|unique:superheroes|min:3|max:50',
            'real_name' => 'required|min:3|max:50',
            'origin_description' => 'required|min:10|max:10000',
            'superpowers' => 'required|min:5|max:10000',
            'catch_phrase' => 'required|min:5|max:1000',
            'image' => 'mimes:jpeg,jpg,png|max:1000',
        ];
    }
}
