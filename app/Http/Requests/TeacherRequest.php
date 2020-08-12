<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'teachername' => 'min:5|max:255|required|regex:/^[a-zA-Z ]*$/',
            'teacheremail' => 'required|unique:teachers,email|email',
            'mobileno' => 'required|unique:teachers|regex:/^[0-9]+$/|min:10|max:12',
            'selectlevel' => 'required'

        ];
    }
    public function messages()
    {
        return [

            'teachername.max' => 'Maximum 255 character Allowed',
            'teachername.regex' => 'Please Enter the Teacher Name',
            'mobileno.unique' => 'The mobile number is already registered',
            'mobileno.regex' => 'enter validate number',
            'teacheremail.email' => 'Please enter a valid email address',
            'teacheremail.unique' => 'The email ID you entered already exist',

        ];
    }
}
