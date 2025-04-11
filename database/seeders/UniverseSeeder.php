<?php

namespace Database\Seeders;

use App\Models\Universe;
use Illuminate\Database\Seeder;

class UniverseSeeder extends Seeder
{
    public function run(): void
    {
        Universe::create(['name' => 'Marvel', 'description' => 'Marvel Comics Universe']);
        Universe::create(['name' => 'DC', 'description' => 'DC Comics Universe']);
    }
} 