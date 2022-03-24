<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    //Desactivar asignacion masiva
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
