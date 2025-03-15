<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superheroes List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Superheroes List</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary mb-3">Create New Superhero</a>

    @if ($superheroes->isEmpty())
        <p>No superheroes found!</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hero Name</th>
                    <th>Real Name</th>
                    <th>Superhero Type</th>
                    <th>Universe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($superheroes as $superhero)
                    <tr>
                        <td>{{ $superhero->name }}</td>
                        <td>{{ $superhero->real_name }}</td>
                        <td>{{ $superhero->type->name ?? 'N/A' }}</td>
                        <td>{{ $superhero->universo->name ?? 'N/A' }}</td> <!-- Corrección aquí -->
                        <td>
                            <a href="{{ route('superheroes.show', $superhero->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('superheroes.destroy', $superhero->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>

