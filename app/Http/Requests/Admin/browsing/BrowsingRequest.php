<?php

namespace App\Http\Requests\Admin\browsing;

use Illuminate\Foundation\Http\FormRequest;

class BrowsingRequest extends FormRequest
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
            
        ];
        return $rules;
    }

    public function message() {
        $message = [
            'name.required' => 'The style name field is required.',
            'phone.required' => 'The teacher field is required.',
            'id_class.required' => 'The course field is required.',
        ];
        return $message;
    }
}
