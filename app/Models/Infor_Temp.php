<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infor_Temp extends Model
{
    protected $table = 'infor_temps';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'id_class',
        'price',
    ];
}
