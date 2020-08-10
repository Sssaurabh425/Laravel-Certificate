<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'coursename' => 'min:5|max:255|required',
            'coursedesc' => 'required',
            'aname' => 'required',
            'arole' => 'required',
            'asignature' => 'required',

        ];
    }
}
