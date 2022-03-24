<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'iframe',
        'excerpt',
        'published_at',
        'category_id'
    ];

    protected $dates = ['published_at'];

    public function category()
    { // $post->category->name
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
      return $this->hasMany(Photo::class);  
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

    //mutador para title
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
                                                ?   $category
                                                :   Category::create([ 'name' => $category ])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;

        });

        //Sincronizar etiquetas
       return $this->tags()->sync($tagIds);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
           //Eliminar relacion con tags
            $post->tags()->detach();

            //FORMA 1 para eliminar fotos del post
            // foreach ($post->photos as $photo):
            //     $photo->delete();
            // endforeach;

            // FORMA 2
            // $post->photos->each(function($photo){
            //     $photo->delete();
            // });

            // Forma 3
            $post->photos->each->delete();
        });
    }
}
