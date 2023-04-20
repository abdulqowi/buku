<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name();
        return [
            'title' => $title,
            'isbn' => $this->faker->isbn13(),
            'image' => $this->faker->imageUrl(),
            'dimension' => $this->faker->randomElement(['20x20', '30x30', '40x40']),
            'year' => $this->faker->year(),
            'page' => $this->faker->randomElement(['100', '200', '300']),
            'synopsis' => $this->faker->paragraph(),
            'price' => $this->faker->randomElement(['10000', '20000', '30000']),
            
        ];
    }
}
