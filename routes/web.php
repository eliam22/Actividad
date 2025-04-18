<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperHeroController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas con autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas protegidas de recursos
    Route::resource('universes', UniverseController::class)->middleware(['auth']);
    Route::resource('genders', GenderController::class);
    Route::resource('superheroes', SuperHeroController::class)->middleware(['auth']);
    Route::get('/genders/create', [GenderController::class, 'create'])->name('genders.create');
});

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';

// Agrega esto al final del archivo
Route::prefix('api')->group(function () {
    // Test route
    Route::get('test', function () {
        return response()->json(['message' => 'API is working']);
    });
    
    // Universe routes
    Route::get('universes', [App\Http\Controllers\Api\UniverseApiController::class, 'index']);
    Route::get('universes/{name}', [App\Http\Controllers\Api\UniverseApiController::class, 'show']);

    // Superhero routes
    Route::get('superheroes', [App\Http\Controllers\Api\SuperHeroApiController::class, 'index']);
    Route::get('superheroes/{name}', [App\Http\Controllers\Api\SuperHeroApiController::class, 'show']);

    // Gender routes
    Route::get('genders', [App\Http\Controllers\Api\GenderApiController::class, 'index']);
    Route::get('genders/{name}', [App\Http\Controllers\Api\GenderApiController::class, 'show']);
});