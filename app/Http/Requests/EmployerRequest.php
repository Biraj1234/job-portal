<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|unique:employers",
            "phone" => "required|unique:employers",
            "password" => "required",
            "cpassword" => "required|same:password",
            "logo_name" => "required",
            "address" => "required",
            "description" => "required"
        ];
    }
}
