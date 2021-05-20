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
            'limit' => 'required',
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'Class name must not be null.',
            'price.required' => 'Class price must not be null.',
            'price.numeric' => 'Price must not be null.',
            'description.required' => 'Class description must not be null.',
            'id_teacher.required' => 'Teacher ID must not be null.',
            'id_subject.required' => 'Subject ID must not be null.',
            'id_course.required' => 'Course ID must not be null.',
        ];
        return $message;
    }
}
