<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\UniverseController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genders', GenderController::class);
Route::resource('universes', UniverseController::class);


