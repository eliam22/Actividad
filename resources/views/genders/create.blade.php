@extends('layouts.app')

@section('title', 'Create Gender')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create New Gender</h2>
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

            <form action="{{ route('genders.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name (English)</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="display_name" class="form-label">Display Name (Spanish)</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="{{ old('display_name') }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('genders.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Gender</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
