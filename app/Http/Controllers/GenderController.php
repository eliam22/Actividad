<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    public function create()
    {
        return view('genders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Gender::create($request->all());

        return redirect()->route('genders.index')->with('success', 'Gender created successfully.');
    }
}

