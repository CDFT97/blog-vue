<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['published_at'];

    public function category()
    { // $post->category->name
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //queryScope
    public function scopePublished($query)
    {
        //Obtiene los post con fecha valida (Not null , fechas presente o pasadas, futuras no)
        $query->whereNotNull('published_at')
                        ->latest('published_at')
                        ->where('published_at', '<=', Carbon::now() );
    }

    //ruta amigable
    public function getRouteKeyName()
    {
        return 'url';
    }
}
