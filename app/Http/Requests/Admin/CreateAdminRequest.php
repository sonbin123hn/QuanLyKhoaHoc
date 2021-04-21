<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'phone' => 'required|min:10|numeric',
            'address' => 'required',
        ];
    }
    public function message()
    {
        $message = [
            'name.required' => 'Teacher name must not be null..',
            'address.required' => 'Teacher address must not be null.',
            'phone.min' => 'Phone number must have at least 10 numbers.',
            'email.required' => 'Teacher email must not be null.',
            'email.email' => 'Email is not in the correct format.',
            'email.unique' => 'Email already exists.',
            'phone.numeric' => 'Phone number is not in the correct format.',

        ];
        return $message;
    }
}
