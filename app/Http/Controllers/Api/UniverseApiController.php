<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UniverseApiController extends Controller
{
    public function index(): JsonResponse
    {
        $universes = Universe::withCount('superheroes')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $universes
        ]);
    }

    public function show($name): JsonResponse
    {
        $universe = Universe::where('name', 'LIKE', "%{$name}%")
            ->with(['superheroes' => function($query) {
                $query->with(['gender', 'type']);
            }])
            ->firstOrFail();
        
        return response()->json([
            'status' => 'success',
            'data' => [
                'universe' => $universe->name,
                'description' => $universe->description,
                'heroes_count' => $universe->superheroes->count(),
                'superheroes' => $universe->superheroes->map(function($hero) {
                    return [
                        'name' => $hero->name,
                        'real_name' => $hero->real_name,
                        'type' => $hero->type->name,
                        'gender' => $hero->gender->display_name,
                        'powers' => $hero->powers,
                        'affiliation' => $hero->affiliation
                    ];
                })
            ]
        ]);
    }
} 