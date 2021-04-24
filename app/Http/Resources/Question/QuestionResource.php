<?php

namespace App\Http\Resources\Question;

use App\Http\Resources\Ans\AnsCollection;
use App\Http\Resources\Ans\AnsResource;
use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'content' => $this->content,
            'level' => $this->level,
        ];
    }
}
