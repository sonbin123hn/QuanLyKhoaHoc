<?php

namespace App\Http\Resources\UserClass;

use App\Http\Resources\Classes\ClassesCollection;
use App\Http\Resources\Classes\ClassesResource;
use App\Models\Classes;
use Illuminate\Http\Resources\Json\JsonResource;

class UserClassResource extends JsonResource
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
            'class' => new ClassesResource(Classes::findOrFail($this->id_class)),
        ];
    }
}
