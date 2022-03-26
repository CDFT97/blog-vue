<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Storage::deleteDirectory('public');

        $data = [
            [
            'title' => 'Titulo 1',
            'url' => str_slug('Titulo 1'),
            'excerpt' => 'Extracto de mi primer post',
            'body'   =>  'contenido de mi primer post',
            'published_at' => Carbon::now()->subDays(5),
            'category_id'   =>  4,
            'user_id'   =>  1,
            ],
            [
            'title' => 'Titulo 2',
            'url' => str_slug('Titulo 2'),
            'excerpt' => 'Extracto de mi Segundo post',
            'body'   =>  'contenido de mi Segundo post',
            'published_at' => Carbon::now()->subDays(4),
            'category_id'   =>  2,
            'user_id'   =>  1,
            ],
            [
            'title' => 'Titulo 3',
            'url' => str_slug('Titulo 3'),
            'excerpt' => 'Extracto de mi tercer post',
            'body'   =>  'contenido de mi tercer post',
            'published_at' => Carbon::now()->subDays(3),
            'category_id'   =>  1,
            'user_id'   =>  1,
            ],
            [
            'title' => 'Titulo 4',
            'url' => str_slug('Titulo 4'),
            'excerpt' => 'Extracto de mi cuarto post',
            'body'   =>  'contenido de mi cuarto post',
            'published_at' => Carbon::now()->subDays(2),
            'category_id'   =>  8,
            'user_id'   =>  1,
            ],
            [
            'title' => 'Titulo 5',
            'url' => str_slug('Titulo 5'),
            'excerpt' => 'Extracto de mi quinto post',
            'body'   =>  'contenido de mi quinto post',
            'published_at' => Carbon::now()->subDays(1),
            'category_id'   =>  6,
            'user_id'   =>  1,
            ]
        ];

        DB::table('posts')->insert($data);
        

    }
}
