<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
} 