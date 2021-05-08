<?php

namespace App\Http\Resources\Exams;

use App\Http\Resources\Classes\ClassesResource;
use App\Models\Classes;
use App\Models\Exams;
use Illuminate\Http\Resources\Json\JsonResource;

class DoneExamsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'scores' => $this->scores,
            'right_ans' => $this->right_ans,
            'wrong_ans' => $this->wrong_ans,
            'class' => new ClassesResource(Classes::findOrFail($this->id_class)),
            'exams' => new ExamsResource(Exams::findOrFail($this->id_exams)),
        ];
    }
}
