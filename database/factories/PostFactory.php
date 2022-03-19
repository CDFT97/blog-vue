<?php

namespace Database\Factories;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'excerpt' => $this->faker->words(),
            'body' => $this->faker->paragraph(),
            'published_at' =>  Carbon::now(),
            'category_id' => $this->faker->randomDigitNotNull()
        ];
    }
}
