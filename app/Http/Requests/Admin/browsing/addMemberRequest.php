<?php

namespace App\Http\Requests\Admin\browsing;

use Illuminate\Foundation\Http\FormRequest;

class addMemberRequest extends FormRequest
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
            'phone' => 'required',
            'id_class' => 'required',
            'email' => 'required|string|email|max:255|unique:infor_temps',
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'Name must not be null.',
            'phone.required' => 'Phone number must not be null.',
            'id_class.required' => 'Class ID must not be null.',
        ];
        return $message;
    }
}
