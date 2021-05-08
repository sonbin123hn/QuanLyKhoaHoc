<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'scores',
        'id_user',
        'id_class',
        'right_ans',
        'wrong_ans',
        'id_exams',
    ];
}
