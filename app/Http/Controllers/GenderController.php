<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Universo;
use App\Models\SuperheroType;


class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    public function create()
    {
        $universes = Universo::all(); // Obtener universos
        $types = SuperheroType::all(); // Obtener tipos de superhéroes
        $genders = Gender::all(); // Obtener géneros

        return view('genders.create', compact('universes', 'types', 'genders'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Gender::create($request->all());

        return redirect()->route('genders.index')->with('success', 'Gender created successfully.');
    }
    public function edit($id)
    {
        // Obtener el género a editar
        $gender = Gender::findOrFail($id);
        $universes = Universo::all(); // Obtener universos
        $types = SuperheroType::all(); // Obtener tipos de superhéroes

        return view('genders.edit', compact('gender', 'universes', 'types'));
    }
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Obtener el género a actualizar
        $gender = Gender::findOrFail($id);
        $gender->name = $request->name;
        $gender->save();

        // Redirigir al índice de géneros con un mensaje de éxito
        return redirect()->route('genders.index')->with('success', 'Género actualizado exitosamente.');
    }
    public function destroy($id)
    {
        // Obtener el género a eliminar
        $gender = Gender::findOrFail($id);
        $gender->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('genders.index')->with('success', 'Género eliminado exitosamente.');
    }

}

