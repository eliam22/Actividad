<?php

namespace Database\Seeders;

use App\Models\SuperHeroType;
use Illuminate\Database\Seeder;

class SuperHeroTypeSeeder extends Seeder
{
    public function run(): void
    {
        SuperHeroType::create(['name' => 'Mutant', 'description' => 'Powers through genetic mutation']);
        SuperHeroType::create(['name' => 'Tech', 'description' => 'Technology-based powers']);
        SuperHeroType::create(['name' => 'Mystic', 'description' => 'Magical or supernatural powers']);
    }
}

