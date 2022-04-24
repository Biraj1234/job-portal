<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSeekerRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:jobseekers',
            'password' => 'required',
            'phone' => 'required|unique:jobseekers',
            'email' => 'required|unique:jobseekers',
            'dob' => 'required',
            'profile_name' => 'required',
            'bio' => 'required',
            'job_skill_id' => 'required',

            'cpassword' => 'required|same:password',
            'category_id' => 'required',





        ];
    }
}
