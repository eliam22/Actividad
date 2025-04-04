<?php

namespace Database\Factories;

use App\Models\SuperHero;
use App\Models\Universe;
use App\Models\Gender;
use App\Models\SuperHeroType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperHeroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuperHero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $powers = [
            'Super Fuerza',
            'Vuelo',
            'Invisibilidad',
            'Telepatía',
            'Control Mental',
            'Regeneración',
            'Super Velocidad',
            'Control Elemental'
        ];

        $affiliations = [
            'Vengadores',
            'Liga de la Justicia',
            'X-Men',
            'Guardianes de la Galaxia',
            'Independiente'
        ];

        return [
            'name' => $this->faker->unique()->name,
            'real_name' => $this->faker->name,
            'universe_id' => Universe::inRandomOrder()->first()->id,
            'type_id' => SuperHeroType::inRandomOrder()->first()->id,
            'gender_id' => Gender::inRandomOrder()->first()->id,
            'powers' => json_encode($this->faker->randomElements($powers, rand(1, 3))),
            'affiliation' => $this->faker->randomElement($affiliations),
        ];
    }
} 