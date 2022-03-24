<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $tag = new Tag;
        $tag->name = "Etiqueta 1";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Etiqueta 2";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Etiqueta 3";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Etiqueta 4";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Etiqueta 5";
        $tag->save();

        // $data = [
        //     [
        //     'name' => 'Etiqueta 1',
        //     ],
        //     [
        //     'name' => 'Etiqueta 2',
        //     ],
        //     [
        //     'name' => 'Etiqueta 3',
        //     ],
        //     [
        //     'name' => 'Etiqueta 4',
        //     ],
            
        // ];

        // DB::table('tags')->insert($data);
    }
}
