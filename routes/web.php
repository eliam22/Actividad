<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperHeroController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\GenderController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('universes', UniverseController::class);
Route::resource('gender', GenderController::class);
Route::resource('superheroes', SuperHeroController::class);


Route::get('/superheroes/create', [SuperHeroController::class, 'create'])->name('superheroes.create');
Route::post('/superheroes', [SuperHeroController::class, 'store'])->name('superheroes.store');
