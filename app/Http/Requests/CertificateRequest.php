<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'teacheremail' => 'required|email',
            'teacherdoc' => 'required',
            'selectcourse' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'teachername.regex' => 'Please Enter Teacher Names',
            'teachername.max' => 'Maximum 255 character ',
            'teacheremail.email' => 'Please enter a valid email address',
            'teacheremail.unique' => 'The email ID you entered already exist',

        ];
    }
}
