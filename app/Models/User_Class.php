<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Class extends Model
{
    protected $table = 'user_classes';
    protected $fillable = [
        'id_user',
        'id_class',
    ];
    public function Classes()
    {
        return $this->belongsTo(Classes::class,'id_class','id');
    }
}
