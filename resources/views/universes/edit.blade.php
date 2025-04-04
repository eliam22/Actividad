@extends('layouts.app')

@section('title', 'Edit Universe')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Universe</h2>
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

            <form action="{{ route('universes.update', $universe) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $universe->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $universe->description) }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('universes.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Universe</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
