<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            "title" => 'required',
            "description" => 'required',
            "status" => 'required',
            "deadline" => 'required',
            "job_type_id" => 'required',
            "job_level_id" => 'required',
            "category_id" => 'required',
            "no_of_vaccancy" => 'required',
            "benifits" => 'required',
            "requirements" => 'required',
            "location_id" => 'required',
            "job_type_id" => 'required',
            "job_skill_id" => 'required'

        ];
    }
}
