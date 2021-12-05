<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model 
{
    
    protected $fillable = [
        'a_id', 'user_id', 'topic_id', 't_nom'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
