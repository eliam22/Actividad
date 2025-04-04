@extends('layouts.app')

@section('title', 'Edit Superhero')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Superhero</h2>
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

            <form action="{{ route('superheroes.update', $superhero) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Superhero Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $superhero->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="real_name" class="form-label">Real Name</label>
                    <input type="text" class="form-control" id="real_name" name="real_name" 
                           value="{{ old('real_name', $superhero->real_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="universe_id" class="form-label">Universe</label>
                    <select class="form-control" id="universe_id" name="universe_id" required>
                        @foreach($universes as $universe)
                            <option value="{{ $universe->id }}"
                                {{ old('universe_id', $superhero->universe_id) == $universe->id ? 'selected' : '' }}>
                                {{ $universe->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Type</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}"
                                {{ old('type_id', $superhero->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gender_id" class="form-label">Gender</label>
                    <select class="form-control" id="gender_id" name="gender_id" required>
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}"
                                {{ old('gender_id', $superhero->gender_id) == $gender->id ? 'selected' : '' }}>
                                {{ $gender->display_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Powers</label>
                    @php
                        $powersList = [
                            'Super Strength',
                            'Flight',
                            'Invisibility',
                            'Telepathy',
                            'Mind Control',
                            'Regeneration',
                            'Super Speed',
                            'Elemental Control'
                        ];
                        $currentPowers = old('powers', $superhero->powers) ?? [];
                        if (!is_array($currentPowers)) {
                            $currentPowers = json_decode($currentPowers, true) ?? [];
                        }
                    @endphp
                    
                    <div class="row">
                        @foreach($powersList as $power)
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" 
                                           name="powers[]" value="{{ $power }}" 
                                           id="power_{{ $loop->index }}"
                                           {{ in_array($power, $currentPowers) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="power_{{ $loop->index }}">
                                        {{ $power }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="affiliation" class="form-label">Affiliation</label>
                    <select class="form-control" id="affiliation" name="affiliation" required>
                        @php
                            $affiliations = [
                                'Avengers',
                                'Justice League',
                                'X-Men',
                                'Guardians of the Galaxy',
                                'Independent'
                            ];
                        @endphp
                        @foreach($affiliations as $affiliation)
                            <option value="{{ $affiliation }}"
                                {{ old('affiliation', $superhero->affiliation) == $affiliation ? 'selected' : '' }}>
                                {{ $affiliation }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Superhero</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




