<?php

namespace App\Http\Requests\Admin\exams;

use App\Models\Classes;
use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class CreateExamsRequest extends FormRequest
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
        $id = Request::get('id_class');
        $de = 0;
        $kho = 0;
        $tb = 0;
        if($id != ""){
            $class = Classes::findOrFail(Request::get('id_class'));
            $de = Question::where('level',1)->Where("id_subject",$class['id_subject'])->count();
            $tb = Question::where('level',2)->Where("id_subject",$class['id_subject'])->count();
            $kho = Question::where('level',3)->Where("id_subject",$class['id_subject'])->count();
        }
        
        return [
            'date_begin'=>'required',
            'time_begin'=>'required',
            'name'=>'required',
            'duration'=>'required',
            'description'=>'required',
            'de'=>'required|numeric|lte:'.$de,
            'tb'=>'required|numeric|lte:'.$tb,
            'kho'=>'required|numeric|lte:'.$kho,
            'id_class' =>'required',
        ];
    }
    public function message() {
        $message = [
            'date_begin.required' => 'The style name field is required.',
            'time_begin.required' => 'The style name field is required.',
            'name.required' => 'The style name field is required.',
            'duration.required' => 'The style name field is required.',
            'description.required' => 'The style name field is required.',
            'de.required' => 'The style name field is required.',
            'tb.required' => 'The style name field is required.',
            'kho.required' => 'The style name field is required.',
            'id_class.required' => 'The group field is required',
        ];
        return $message;
    }  
}
