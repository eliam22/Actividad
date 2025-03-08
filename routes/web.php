<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genders', GenderController::class);

