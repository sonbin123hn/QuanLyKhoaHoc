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
            'question' => $this->question,
            'answers_A' => $this->answers_A,
            'answers_B' => $this->answers_B,
            'answers_C' => $this->answers_C,
            'answers_D' => $this->answers_D,
        ];
    }
}
