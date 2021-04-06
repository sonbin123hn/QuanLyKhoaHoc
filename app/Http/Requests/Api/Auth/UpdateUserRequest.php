<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends ApiRequest
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
            'phone' => 'nullable|numeric|min:10',
            'name' => 'nullable',
            'password' => 'nullable|min:6'
        ];
    }
    public function messages()
    {
        $messages = [
            'phone.min' => 'phone phải chứa ít nhất 10 kí tự',
            'password.min' => 'password phải chứa ít nhất 10 kí tự'
        ];
        return $messages;
    }
}
