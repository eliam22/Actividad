@extends('layouts.app')

@section('title', 'Genders')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Genders</h2>
            <a href="{{ route('genders.create') }}" class="btn btn-primary">Create New Gender</a>
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
                            <th>Display Name</th>
                            <th>Heroes Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($genders as $gender)
                        <tr>
                            <td>{{ $gender->id }}</td>
                            <td>{{ $gender->name }}</td>
                            <td>{{ $gender->display_name }}</td>
                            <td>{{ $gender->superheroes->count() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('genders.show', $gender) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('genders.edit', $gender) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('genders.destroy', $gender) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this gender?')">
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
