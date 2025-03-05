<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperheroTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('superhero_types')->insert([
            ['name' => 'Mutant'],
            ['name' => 'Alien'],
            ['name' => 'Human'],
        ]);
    }
}

