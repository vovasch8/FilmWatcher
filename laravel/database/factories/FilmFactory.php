<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'type' => rand(0,1) ? "film" : "serial",
            'description' => $this->faker->text(250),
            'actors' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(),
            'year' => $this->faker->year(),
            'genre' => $this->faker->word(),
            'trailer' => 'https://www.youtube.com/watch?v=a6kIEDrSk54'
        ];
    }
}
