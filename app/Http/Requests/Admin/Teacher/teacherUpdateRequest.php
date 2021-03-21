<?php

namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class teacherUpdateRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:teachers,email,'.$this->id,
            'phone'=>'required|min:10|numeric',
            'address' => 'required',
           
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'The style name field is required.',
            'address.required' => 'The group field is required',
            'phone.min' => 'it nhất 10 số',
            'email.required' => 'Email là trường bắt buộc', 
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email da ton tai',
            'phone.numeric' => 'The phone field incorrect format',
        ];
        return $message;
    }   
}
