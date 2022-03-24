<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;
    //Desactivar asignacion masiva
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
    //Eliminar imagen del servidor
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            //Modificar Url
            $photoPath = str_replace('storage', 'public', $photo->url);

            Storage::delete($photoPath); 
        });
    }
}
