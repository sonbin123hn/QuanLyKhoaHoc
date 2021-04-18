<?php

namespace App\Http\Requests\Admin\subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'image' => 'required',
            'avatar' => 'required',
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'The style name field is required.',
            'image.required' => 'The image field is required.',
            'avatar.required' => 'The image field is required.',
            'description.required' => 'The group field is required',
        ];
        return $message;
    }   
}
