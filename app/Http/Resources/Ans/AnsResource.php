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
            'answer_A' => $this->answer_A,
            'answer_B' => $this->answer_B,
            'answer_C' => $this->answer_C,
            'answer_D' => $this->answer_D,
            'question' => new QuestionResource(Question::findOrFail($this->id_question)),
        ];
    }
}
