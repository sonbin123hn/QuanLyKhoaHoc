<?php

namespace App\Http\Resources\Ans;

use App\Http\Resources\Exams\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;

class AnsResource extends JsonResource
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
            'id_question' => $this->id,
            'question' => $this->question,
            'A' => $this->answers_A,
            'B' => $this->answers_B,
            'C' => $this->answers_C,
            'D' => $this->answers_D,
        ];
    }
}
