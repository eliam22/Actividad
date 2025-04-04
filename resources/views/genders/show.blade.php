@extends('layouts.app')

@section('title', 'Gender Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>{{ $gender->display_name }}</h2>
            <div>
                <a href="{{ route('genders.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('genders.edit', $gender) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Gender Information</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="bg-light" width="30%">ID</th>
                                    <td>{{ $gender->id }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Name</th>
                                    <td>{{ $gender->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Display Name</th>
                                    <td>{{ $gender->display_name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Created At</th>
                                    <td>{{ $gender->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Last Updated</th>
                                    <td>{{ $gender->updated_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Associated Superheroes</h4>
                        </div>
                        <div class="card-body">
                            @if($gender->superheroes->count() > 0)
                                <div class="list-group">
                                    @foreach($gender->superheroes as $hero)
                                        <a href="{{ route('superheroes.show', $hero) }}" 
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            {{ $hero->name }}
                                            <span class="badge bg-primary rounded-pill">{{ $hero->universe->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No superheroes associated with this gender.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <form action="{{ route('genders.destroy', $gender) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this gender?')">
                        Delete Gender
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

