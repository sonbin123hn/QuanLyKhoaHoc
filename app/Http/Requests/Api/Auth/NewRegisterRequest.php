<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class NewRegisterRequest extends ApiRequest
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
            'id_class' => 'required',
            'price'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_class.required' => 'Mật khẩu là trường bắt buộc', 
            'price.required' => 'Mật khẩu là trường bắt buộc', 
        ];
    }
}
