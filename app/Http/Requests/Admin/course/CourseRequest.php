<?php

namespace App\Http\Requests\Admin\course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'day_start' => 'required|date',
            'day_end' => 'required|date',
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Course name is required field',
            'day_start.required' => 'Day start is required field',
            'day_end.required' => 'Day end is required field',
            'day_start.date'=> ' (dd-mm-YYYY).',
            'day_end.date'=> ' (dd-mm-YYYY).',
        ];
        return $messages;
    }
}
