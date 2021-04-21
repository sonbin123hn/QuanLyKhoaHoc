<?php

namespace App\Http\Requests\Admin\subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjecUpdatetRequest extends FormRequest
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
            'description' => 'required',
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'Subject name must not be null.',
            'description.required' => 'Subject description must not be null.',
        ];
        return $message;
    }   
}
