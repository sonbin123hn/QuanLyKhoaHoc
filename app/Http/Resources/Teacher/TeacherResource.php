<?php

namespace App\Http\Resources\Teacher;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'id_teacher' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'image' => $this->image,
            'email' => $this->email,
            'description' => $this->description,
            'rate' => $this->rate,
            'address' => $this->address,
        ];
    }
}
