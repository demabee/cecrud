<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            "logo" => "image|mimes:jpg,jpeg,png,PNG,JPG,JPEG",
            "name" => "required",
            "email" => "required|email|unique:companies",
            "website" => "required|unique:companies",
            "emp_email" => "required|unique:employees"
        ];
    }
}
