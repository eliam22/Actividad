<?php

use App\Http\Controllers\Api\UniverseController;
use App\Http\Controllers\Api\SuperHeroController;
use App\Http\Controllers\Api\GenderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Test route
Route::get('test', fn () => response()->json(['message' => 'API is working']));

// Gender endpoints
Route::get('genders', [GenderApiController::class, 'index']);
Route::get('genders/{id}', [GenderApiController::class, 'show']);

// Universe endpoints
Route::get('universes', [UniverseApiController::class, 'index']);
Route::get('universes/{id}', [UniverseApiController::class, 'show']);

// SuperHero endpoints
Route::get('superheroes', [SuperHeroApiController::class, 'index']);
Route::get('superheroes/{id}', [SuperHeroApiController::class, 'show']);