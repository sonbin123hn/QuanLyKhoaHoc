<?php

namespace App\Http\Resources\Rated;

use App\Http\Resources\Auth\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ListRatedResource extends JsonResource
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
            'rate' => $this->rate,
            'content' => $this->content,
            'teacher' => new TeacherResource(Teacher::findOrFail($this->id_teacher)),
            'subject' => new UserResource(User::findOrFail($this->id_user)),
        ];
    }
}
