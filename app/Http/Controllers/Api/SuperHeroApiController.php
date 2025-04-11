<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SuperHero;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SuperHeroApiController extends Controller
{
    public function index(): JsonResponse
    {
        $superheroes = SuperHero::with(['universe', 'gender', 'type'])->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $superheroes
        ]);
    }

    public function show($name): JsonResponse
    {
        $superhero = SuperHero::where('name', 'LIKE', "%{$name}%")
            ->with(['universe', 'gender', 'type'])
            ->firstOrFail();
        
        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $superhero->name,
                'real_name' => $superhero->real_name,
                'universe' => $superhero->universe->name,
                'type' => $superhero->type->name,
                'gender' => $superhero->gender->display_name,
                'powers' => $superhero->powers,
                'affiliation' => $superhero->affiliation
            ]
        ]);
    }
} 