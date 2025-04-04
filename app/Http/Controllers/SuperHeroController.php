<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperHero;
use App\Models\Universe;
use App\Models\SuperHeroType;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;

class SuperHeroController extends Controller
{
    public function index()
    {
        $superheroes = SuperHero::with(['universe', 'type', 'gender'])->get();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        $universes = Universe::all();
        $types = SuperHeroType::all();
        $genders = Gender::all();

        return view('superheroes.create', compact('universes', 'types', 'genders'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'real_name' => 'required|string|max:255',
                'universe_id' => 'required|exists:universes,id',
                'type_id' => 'required|exists:superhero_types,id',
                'gender_id' => 'required|exists:genders,id',
                'powers' => 'required|array',
                'affiliation' => 'required|string|max:255'
            ]);

            $validated['powers'] = json_encode($validated['powers']);

            DB::beginTransaction();
            SuperHero::create($validated);
            DB::commit();

            return redirect()
                ->route('superheroes.index')
                ->with('success', 'Superhéroe creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error al crear el superhéroe: ' . $e->getMessage());
        }
    }

    public function show(SuperHero $superhero)
    {
        $superhero->load(['universe', 'type', 'gender']);
        return view('superheroes.show', compact('superhero'));
    }

    public function edit(SuperHero $superhero)
    {
        $universes = Universe::all();
        $types = SuperHeroType::all();
        $genders = Gender::all();

        return view('superheroes.edit', compact('superhero', 'universes', 'types', 'genders'));
    }

    public function update(Request $request, SuperHero $superhero)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'real_name' => 'required|string|max:255',
                'universe_id' => 'required|exists:universes,id',
                'type_id' => 'required|exists:superhero_types,id',
                'gender_id' => 'required|exists:genders,id',
                'powers' => 'required|array',
                'affiliation' => 'required|string|max:255'
            ]);

            $validated['powers'] = json_encode($validated['powers']);

            DB::beginTransaction();
            $superhero->update($validated);
            DB::commit();

            return redirect()
                ->route('superheroes.index')
                ->with('success', 'Superhéroe actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error al actualizar el superhéroe: ' . $e->getMessage());
        }
    }

    public function destroy(SuperHero $superhero)
    {
        try {
            DB::beginTransaction();
            $superhero->delete();
            DB::commit();

            return redirect()
                ->route('superheroes.index')
                ->with('success', 'Superhéroe eliminado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar el superhéroe: ' . $e->getMessage());
        }
    }
}


