<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;
use App\Models\Universo;
use App\Models\SuperHeroType;
use App\Models\Gender;

class SuperheroController extends Controller
{
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        $universes = Universo::all();
        $types = SuperHeroType::all();
        $genders = Gender::all();

        return view('superheroes.create', compact('universes', 'types', 'genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'real_name' => 'required|string|max:255',
            'universe_id' => 'required|exists:universos,id',
            'type_id' => 'required|exists:superhero_types,id',
            'gender_id' => 'required|exists:genders,id',
            'powers' => 'required|string',
            'affiliation' => 'nullable|string|max:255',
        ]);

        Superhero::create($validated);

        return redirect()->route('superheroes.index')->with('success', 'Superhero created successfully.');
    }

    public function show(Superhero $superhero)
    {
        return view('superheroes.show', compact('superhero'));
    }

    public function edit(Superhero $superhero)
    {
        $universes = Universo::all();
        $types = SuperHeroType::all();
        $genders = Gender::all();

        return view('superheroes.edit', compact('superhero', 'universes', 'types', 'genders'));
    }

    public function update(Request $request, Superhero $superhero)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'real_name' => 'required|string|max:255',
            'universe_id' => 'required|exists:universos,id',
            'type_id' => 'required|exists:superhero_types,id',
            'gender_id' => 'required|exists:genders,id',
            'powers' => 'required|string',
            'affiliation' => 'nullable|string|max:255',
        ]);

        $superhero->update($validated);

        return redirect()->route('superheroes.index')->with('success', 'Superhero updated successfully.');
    }

    public function destroy(Superhero $superhero)
    {
        $superhero->delete();

        return redirect()->route('superheroes.index')->with('success', 'Superhero deleted successfully.');
    }
}


