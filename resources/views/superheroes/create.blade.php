@extends('layouts.app')

@section('title', 'Crear Superhéroe')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Crear Nuevo Superhéroe</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('superheroes.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Superhéroe</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="real_name" class="form-label">Nombre Real</label>
                    <input type="text" class="form-control" id="real_name" name="real_name" 
                           value="{{ old('real_name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="universe_id" class="form-label">Universo</label>
                    <select class="form-control" id="universe_id" name="universe_id" required>
                        <option value="">Selecciona un universo</option>
                        @foreach($universes as $universe)
                            <option value="{{ $universe->id }}" 
                                {{ old('universe_id') == $universe->id ? 'selected' : '' }}>
                                {{ $universe->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="">Selecciona un tipo</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}"
                                {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gender_id" class="form-label">Género</label>
                    <select class="form-control" id="gender_id" name="gender_id" required>
                        <option value="">Selecciona un género</option>
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}"
                                {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                                {{ $gender->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poderes</label>
                    @php
                        $powersList = [
                            'Super Fuerza',
                            'Vuelo',
                            'Invisibilidad',
                            'Telepatía',
                            'Control Mental',
                            'Regeneración',
                            'Super Velocidad',
                            'Control Elemental'
                        ];
                        $currentPowers = old('powers', []);
                    @endphp
                    
                    @foreach($powersList as $power)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" 
                                   name="powers[]" value="{{ $power }}" 
                                   id="power_{{ $loop->index }}"
                                   {{ in_array($power, $currentPowers) ? 'checked' : '' }}>
                            <label class="form-check-label" for="power_{{ $loop->index }}">
                                {{ $power }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="affiliation" class="form-label">Afiliación</label>
                    <select class="form-control" id="affiliation" name="affiliation" required>
                        <option value="">Selecciona una afiliación</option>
                        @php
                            $affiliations = [
                                'Vengadores',
                                'Liga de la Justicia',
                                'X-Men',
                                'Guardianes de la Galaxia',
                                'Independiente'
                            ];
                        @endphp
                        @foreach($affiliations as $affiliation)
                            <option value="{{ $affiliation }}"
                                {{ old('affiliation') == $affiliation ? 'selected' : '' }}>
                                {{ $affiliation }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Superhéroe</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
