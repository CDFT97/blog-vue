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

        $data = [
            [
            'name' => 'Etiqueta 1',
            ],
            [
            'name' => 'Etiqueta 2',
            ],
            [
            'name' => 'Etiqueta 3',
            ],
            [
            'name' => 'Etiqueta 4',
            ],
            
        ];

        DB::table('tags')->insert($data);
    }
}
