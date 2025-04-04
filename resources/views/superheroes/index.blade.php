@extends('layouts.app')

@section('title', 'Superheroes')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Superheroes</h2>
        <a href="{{ route('superheroes.create') }}" class="btn btn-primary">Create New Superhero</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Real Name</th>
                        <th>Universe</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($superheroes as $hero)
                    <tr>
                        <td>{{ $hero->name }}</td>
                        <td>{{ $hero->real_name }}</td>
                        <td>{{ $hero->universe->name }}</td>
                        <td>{{ $hero->type->name }}</td>
                        <td>{{ $hero->gender->display_name }}</td>
                        <td>
                            <a href="{{ route('superheroes.show', $hero) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('superheroes.edit', $hero) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('superheroes.destroy', $hero) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Are you sure you want to delete this superhero?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

