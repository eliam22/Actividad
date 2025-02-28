<?php

namespace Database\Factories;

use App\Models\Superhero;
use App\Models\Universo;
use App\Models\SuperheroType;
use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superhero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'real_name' => $this->faker->name,
            'universe_id' => Universo::factory(),
            'type_id' => SuperheroType::factory(),
            'gender_id' => Gender::factory(),
            'powers' => $this->faker->sentence,
            'affiliation' => $this->faker->word,
        ];
    }
} 