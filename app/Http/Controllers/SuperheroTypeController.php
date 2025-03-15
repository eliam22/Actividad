<?php

// app/Http/Controllers/SuperheroTypeController.php
namespace App\Http\Controllers;

use App\Models\SuperHeroType;  // Asegúrate de usar SuperHeroType
use Illuminate\Http\Request;

class SuperheroTypeController extends Controller
{
    /**
     * Mostrar los tipos de superhéroes para crear un nuevo superhéroe.
     */
    public function index()
    {
        // Obtener todos los tipos de superhéroes
        $types = SuperHeroType::all();  // Usa SuperHeroType en lugar de Type

        // Pasar los tipos a la vista
        return view('superheroes.create', compact('types'));
    }

    // Otros métodos (create, store, etc.) si los necesitas
}
