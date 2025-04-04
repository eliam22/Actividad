<?php

namespace App\Http\Controllers;

use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universes = Universe::withCount('superheroes')->get();
        return view('universes.index', compact('universes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:universes',
                'description' => 'nullable|string|max:1000'
            ]);

            DB::beginTransaction();
            Universe::create($validated);
            DB::commit();

            return redirect()
                ->route('universes.index')
                ->with('success', 'Universo creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error al crear el universo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Universe $universe)
    {
        $universe->load('superheroes');
        return view('universes.show', compact('universe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Universe $universe)
    {
        return view('universes.edit', compact('universe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Universe $universe)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:universes,name,' . $universe->id,
                'description' => 'nullable|string|max:1000'
            ]);

            DB::beginTransaction();
            $universe->update($validated);
            DB::commit();

            return redirect()
                ->route('universes.index')
                ->with('success', 'Universo actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error al actualizar el universo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Universe $universe)
    {
        try {
            if ($universe->superheroes()->exists()) {
                return back()->with('error', 'No se puede eliminar el universo porque tiene superhéroes asociados');
            }

            DB::beginTransaction();
            $universe->delete();
            DB::commit();

            return redirect()
                ->route('universes.index')
                ->with('success', 'Universo eliminado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al eliminar el universo: ' . $e->getMessage());
        }
    }
}



