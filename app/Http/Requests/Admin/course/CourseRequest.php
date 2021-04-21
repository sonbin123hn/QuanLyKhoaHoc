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
            'name.required' => 'Course name must not be null.',
            'day_start.required' => 'Course start day must not be null.',
            'day_end.required' => 'Course end day must not be null.',
            'day_start.date'=> ' (dd-mm-YYYY).',
            'day_end.date'=> ' (dd-mm-YYYY).',
        ];
        return $messages;
    }
}
