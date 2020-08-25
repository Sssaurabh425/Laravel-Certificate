<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'contactname' => 'min:5|max:255|required|regex:/^[a-zA-Z ]*$/',
            'contactemail' => 'required|email',
            'mobileno' => 'required|regex:/^[0-9]+$/|min:10|max:12',
            'institutionname' => 'required',
            'city' => 'required',
            'state' => 'required',

        ];
    }
    public function messages()
    {
        return [

            'contactname.max' => 'Maximum 255 character Allowed',
            'contactname.regex' => 'Please Enter the name',
            'mobileno.unique' => 'The mobile number is already registered',
            'mobileno.regex' => 'enter validate number',
            'contactemail.email' => 'Please enter a valid email address',
            'contactemail.unique' => 'The email ID you entered already exist',

        ];
    }
}
