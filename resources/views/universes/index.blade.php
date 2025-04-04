@extends('layouts.app')

@section('title', 'Universes')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Universes</h2>
            <a href="{{ route('universes.create') }}" class="btn btn-primary">Create New Universe</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Heroes Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($universes as $universe)
                        <tr>
                            <td>{{ $universe->id }}</td>
                            <td>{{ $universe->name }}</td>
                            <td>{{ $universe->description }}</td>
                            <td>{{ $universe->superheroes->count() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('universes.show', $universe) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('universes.edit', $universe) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('universes.destroy', $universe) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this universe?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
