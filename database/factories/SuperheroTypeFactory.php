<?php

namespace Database\Factories;

use App\Models\Superhero;
use App\Models\Universo;
use App\Models\SuperheroType;
use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superhero_types::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
        ];
    }
} 