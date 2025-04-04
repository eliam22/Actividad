@extends('layouts.app')

@section('title', $superhero->name)

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>{{ $superhero->name }}</h2>
            <div>
                <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('superheroes.edit', $superhero) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="bg-light" width="30%">Real Name</th>
                                    <td>{{ $superhero->real_name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Gender</th>
                                    <td>{{ $superhero->gender->display_name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Universe</th>
                                    <td>{{ $superhero->universe->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Type</th>
                                    <td>{{ $superhero->type->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Affiliation</th>
                                    <td>{{ $superhero->affiliation }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Powers</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @php
                                    $powers = is_array($superhero->powers) ? $superhero->powers : json_decode($superhero->powers, true);
                                    $powers = $powers ?? [];
                                @endphp
                                
                                @foreach($powers as $power)
                                    <div class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        {{ $power }}
                                    </div>
                                @endforeach

                                @if(empty($powers))
                                    <div class="list-group-item text-muted">
                                        No powers registered
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h4 class="mb-0">Additional Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="bg-light">Created</th>
                                    <td>{{ $superhero->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Last Updated</th>
                                    <td>{{ $superhero->updated_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <form action="{{ route('superheroes.destroy', $superhero) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this superhero?')">
                        Delete Superhero
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endpush
@endsection
