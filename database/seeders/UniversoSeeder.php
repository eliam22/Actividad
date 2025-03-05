<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversoSeeder extends Seeder
{
    public function run()
    {
        DB::table('universos')->insert([
            [
                'name' => 'Marvel',
                'description' => 'The Marvel Universe is a fictional shared universe where the stories in most American comic book titles and other media published by Marvel Comics take place.'
            ],
            [
                'name' => 'DC',
                'description' => 'The DC Universe is the fictional shared universe where most stories in American comic book titles published by DC Comics occur.'
            ],
            [
                'name' => 'Image',
                'description' => 'Image Comics is an American comic book publisher. It is the third largest comic book and graphic novel publisher in the industry.'
            ],
            [
                'name' => 'Dark Horse',
                'description' => 'Dark Horse Comics is an American comic book and manga publisher. It was founded in 1986 by Mike Richardson in Milwaukie, Oregon.'
            ]
        ]);
    }
}
