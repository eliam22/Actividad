<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenderApiController extends Controller
{
    public function index(): JsonResponse
    {
        $genders = Gender::withCount('superheroes')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $genders
        ]);
    }

    public function show($name): JsonResponse
    {
        $gender = Gender::where('name', 'LIKE', "%{$name}%")
            ->with(['superheroes' => function($query) {
                $query->with(['universe', 'type']);
            }])
            ->firstOrFail();
        
        return response()->json([
            'status' => 'success',
            'data' => [
                'name' => $gender->name,
                'display_name' => $gender->display_name,
                'heroes_count' => $gender->superheroes->count(),
                'superheroes' => $gender->superheroes->map(function($hero) {
                    return [
                        'name' => $hero->name,
                        'real_name' => $hero->real_name,
                        'universe' => $hero->universe->name,
                        'type' => $hero->type->name,
                        'powers' => $hero->powers,
                        'affiliation' => $hero->affiliation
                    ];
                })
            ]
        ]);
    }
} 