<?php

namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class teacherRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:teachers',
            'phone'=>'required|min:10|numeric',
            'address' => 'required',
            'image' => 'required',
            'description' => 'required',
           
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'Teacher name must not be null.',
            'image.required' => 'Teacher image must not be null.',
            'address.required' => 'Teacher address must not be null.',
            'phone.min' => 'Phone number must have at least 10 numbers.',
            'email.required' => 'Teacher email must not be null.', 
            'email.email' => 'Email is not in the correct format.',
            'email.unique' => 'Email already exists.',
            'phone.numeric' => 'Phone number is not in the correct format.',
            'description.required' => 'description must not be null.',
        ];
        return $message;
    }   
}
