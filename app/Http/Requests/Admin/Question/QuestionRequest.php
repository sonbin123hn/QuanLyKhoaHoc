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
        return [
            'question' => 'required',
            'answers_A' => 'required',
            'answers_B' => 'required',
            'answers_C' => 'required',
            'answers_D' => 'required',
            'true_ans' => 'required',
            'level' => 'required',
            'subject' => 'required',
        ];
    }
    public function message() {
        $message = [
            'question.required' => 'Question content must not be null.',
            'answers_A.required' => 'The first answer must not be null.',
            'answers_B.required' => 'The second answer must not be null.',
            'answers_C.required' => 'The thirst answer must not be null.',
            'answers_D.required' => 'The fourth answer must not be null.',
            'true_ans.required' => 'The true answer must not be null.',
            'level.required' => 'Question level must not be null.',
            'subject.required' => 'The subject must not be null.',
        ];
        return $message;
    } 
}
