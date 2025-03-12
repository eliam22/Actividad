<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universo;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universes = Universo::all(); // Obtiene todos los universos
        return view('universes.index', compact('universes')); // Pasa los universos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universes.create'); // Retorna la vista para crear un nuevo universo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear un nuevo universo
        $universo = new Universo();
        $universo->name = $request->input('name');
        $universo->description = $request->input('description');
        $universo->save(); // Guarda el universo en la base de datos

        // Redirigir al usuario a la lista de universos con un mensaje de éxito
        return redirect()->route('universes.index')->with('success', 'Universe created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Aquí puedes agregar la lógica para mostrar un universo específico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Aquí puedes agregar la lógica para editar un universo específico
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Aquí puedes agregar la lógica para actualizar un universo específico
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Aquí puedes agregar la lógica para eliminar un universo específico
    }
}


