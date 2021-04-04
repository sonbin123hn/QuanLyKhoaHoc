<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rated extends Model
{
    protected $table = 'rateds';
    protected $fillable = [
        'rate',
        'content',
        'id_class',
        'id_user',
    ];
}
