@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Welcome to Superhero Universe</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h3>Superheroes</h3>
                                    <p class="display-4">{{ App\Models\SuperHero::count() }}</p>
                                    <a href="{{ route('superheroes.index') }}" class="btn btn-primary">Manage Superheroes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h3>Universes</h3>
                                    <p class="display-4">{{ App\Models\Universe::count() }}</p>
                                    <a href="{{ route('universes.index') }}" class="btn btn-primary">Manage Universes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <h3>Genders</h3>
                                    <p class="display-4">{{ App\Models\Gender::count() }}</p>
                                    <a href="{{ route('genders.index') }}" class="btn btn-primary">Manage Genders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
