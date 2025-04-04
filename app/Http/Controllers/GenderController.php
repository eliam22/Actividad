<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Universe;
use App\Models\SuperHeroType;
use Illuminate\Support\Facades\DB;


class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::withCount('superheroes')->get();
        return view('genders.index', compact('genders'));
    }

    public function create()
    {
        $universes = Universe::all(); // Cambiado de Universo a Universe
        $types = SuperHeroType::all();
        $genders = Gender::all();

        return view('genders.create', compact('universes', 'types', 'genders'));
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:genders',
                'display_name' => 'required|string|max:255'
            ]);

            DB::beginTransaction();
            Gender::create($validated);
            DB::commit();

            return redirect()
                ->route('genders.index')
                ->with('success', 'Gender created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error creating gender: ' . $e->getMessage());
        }
    }
    public function edit(Gender $gender)
    {
        return view('genders.edit', compact('gender'));
    }
    public function update(Request $request, Gender $gender)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:genders,name,' . $gender->id,
                'display_name' => 'required|string|max:255'
            ]);

            DB::beginTransaction();
            $gender->update($validated);
            DB::commit();

            return redirect()
                ->route('genders.index')
                ->with('success', 'Gender updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Error updating gender: ' . $e->getMessage());
        }
    }
    public function destroy(Gender $gender)
    {
        try {
            if ($gender->superheroes()->exists()) {
                return back()->with('error', 'Cannot delete gender because it has associated superheroes');
            }

            DB::beginTransaction();
            $gender->delete();
            DB::commit();

            return redirect()
                ->route('genders.index')
                ->with('success', 'Gender deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error deleting gender: ' . $e->getMessage());
        }
    }
    public function show(Gender $gender)
    {
        $gender->load('superheroes.universe');
        return view('genders.show', compact('gender'));
    }
    

}

