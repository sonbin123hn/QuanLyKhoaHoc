<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'name',
        'price',
        'description',
        'id_course',
        'id_teacher',
        'id_subject',
        "level",
    ];
    public function user_class()
    {
        return $this->hasMany(User_Class::class,'id_class', 'id');
    }
}
