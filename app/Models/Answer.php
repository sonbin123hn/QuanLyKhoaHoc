<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'answers_A',
        'answers_B',
        'answers_C',
        'answers_D',
        'id_question',
    ];
}
