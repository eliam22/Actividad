<?php

namespace Database\Seeders;

use App\Models\SuperHero;
use App\Models\Universe;
use App\Models\SuperHeroType;
use App\Models\Gender;
use Illuminate\Database\Seeder;

class SuperHeroSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 random superheroes
        SuperHero::factory(5)->create();

        // Create specific superheroes
        SuperHero::create([
            'name' => 'Spider-Man',
            'real_name' => 'Peter Parker',
            'universe_id' => Universe::where('name', 'Marvel')->first()->id,
            'type_id' => SuperHeroType::where('name', 'Mutant')->first()->id,
            'gender_id' => Gender::where('name', 'male')->first()->id,
            'powers' => json_encode(['Spider strength', 'Spider sense', 'Wall crawling']),
            'affiliation' => 'Avengers'
        ]);

        SuperHero::create([
            'name' => 'Batman',
            'real_name' => 'Bruce Wayne',
            'universe_id' => Universe::where('name', 'DC')->first()->id,
            'type_id' => SuperHeroType::where('name', 'Tech')->first()->id,
            'gender_id' => Gender::where('name', 'male')->first()->id,
            'powers' => json_encode(['Superior intelligence', 'Martial arts', 'Advanced technology']),
            'affiliation' => 'Justice League'
        ]);
    }
} 