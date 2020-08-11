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
            'teacheremail' => 'required|email',
            'mobileno' => 'required',
            'selectlevel' => 'required'

        ];
    }
}
