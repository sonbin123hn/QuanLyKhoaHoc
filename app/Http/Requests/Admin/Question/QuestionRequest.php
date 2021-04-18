<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'content' => 'required',
            'answers_A' => 'required',
            'answers_B' => 'required',
            'answers_C' => 'required',
            'answers_D' => 'required',
            'true_ans' => 'required',
            'level' => 'required',
            'subject' => 'required',
        ];
        return $rules;
    }
    public function message() {
        $message = [
            'content.required' => 'The style name field is required.',
            'answers_A.required' => 'The style name field is required.',
            'answers_B.required' => 'The style name field is required.',
            'answers_C.required' => 'The style name field is required.',
            'answers_D.required' => 'The style name field is required.',
            'true_ans.required' => 'The image field is required.',
            'level.required' => 'The group field is required',
            'subject.required' => 'The group field is required',
        ];
        return $message;
    } 
}
