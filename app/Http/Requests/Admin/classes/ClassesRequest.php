<?php

namespace App\Http\Requests\Admin\classes;

use Illuminate\Foundation\Http\FormRequest;

class ClassesRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'id_teacher' => 'required',
            'id_subject' => 'required',
            'id_course' => 'required',
            'level' => 'required',
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'The style name field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field is required.',
            'description.required' => 'The group field is required',
            'id_teacher.required' => 'The teacher field is required.',
            'id_subject.required' => 'The subject field is required.',
            'id_course.required' => 'The course field is required.',
        ];
        return $message;
    }
}
