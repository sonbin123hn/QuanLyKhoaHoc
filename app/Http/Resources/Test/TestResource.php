<?php

namespace App\Http\Resources\Test;

use App\Http\Resources\Ans\AnsResource;
use App\Http\Resources\Exams\ExamsResource;
use App\Models\Answer;
use App\Models\Exams;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'duration' => $this->duration,
            'number_of_question' => count($this->question),
            'id_exams' => new ExamsResource(Exams::findOrFail($this->id_exams)),
        ];
    }
}
