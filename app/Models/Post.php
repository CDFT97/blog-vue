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
        'category_id',
        'user_id'
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

    //Verificar si el post es publico
    public function isPublished()
    {
        //Retorna verdado en caso de existir fecha
        //Falso en caso de ser null 
        return ! is_null( $this->published_at ) && $this->published_at < today();
    }

    //ruta amigable
    public function getRouteKeyName()
    {
        return 'url';
    }

    public static function create(array $attributes = [])
    {
        //Crear post solo con el titulo
        $post = static::query()->create($attributes);
        //Generar url amigable con el titulo
        $post->generateUrl();
        
        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);
        //Verificar si existe otro post con esta url
        if($this->where('url', $url)->exists()):
            //Si existe se agrega el id del post recien creado
            $url ="{$url}-{$this->id}";

        endif;
        //Se asigna la url al post
        $this->url = $url;
        //Se guarda
        $this->save();
    }

    //mutador para title
    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;

    //     $originalUrl = $url = str_slug($title);
    //     $count = 1;

    //     while( Post::where('url', $url)->exists() ):
    //         $url = "{$originalUrl}-" . ++$count;
    //     endwhile;

    //     $this->attributes['url'] = $url;
    // }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
