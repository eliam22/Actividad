<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Universe;
use App\Models\Gender;
use App\Models\SuperHeroType;
use App\Models\User;
use App\Models\SuperHero;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123')
        ]);

        // Universos básicos
        Universe::create(['name' => 'Marvel', 'description' => 'Marvel Comics Universe']);
        Universe::create(['name' => 'DC', 'description' => 'DC Comics Universe']);

        // Géneros
        Gender::create([
            'name' => 'male',
            'display_name' => 'Male'
        ]);
        Gender::create([
            'name' => 'female',
            'display_name' => 'Female'
        ]);
        Gender::create([
            'name' => 'other',
            'display_name' => 'Other'
        ]);

        // Tipos de superhéroes
        SuperHeroType::create(['name' => 'Mutant', 'description' => 'Powers through genetic mutation']);
        SuperHeroType::create(['name' => 'Tech', 'description' => 'Technology-based powers']);
        SuperHeroType::create(['name' => 'Mystic', 'description' => 'Magical or supernatural powers']);

        // Crear 5 superhéroes aleatorios
        SuperHero::factory(5)->create();

        // Crear algunos superhéroes específicos
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
