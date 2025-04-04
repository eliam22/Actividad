@extends('layouts.app')

@section('title', 'Edit Gender')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Gender</h2>
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

            <form action="{{ route('genders.update', $gender) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $gender->name) }}" required>
                    <small class="text-muted">Enter the gender name in English (e.g., male, female, other)</small>
                </div>
                <div class="mb-3">
                    <label for="display_name" class="form-label">Display Name</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" 
                           value="{{ old('display_name', $gender->display_name) }}" required>
                    <small class="text-muted">Enter how you want this gender to be displayed</small>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('genders.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
