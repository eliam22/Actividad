<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superhero Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h1 class="mb-4">Superhero Details</h1>

    <p><strong>Hero Name:</strong> {{ $superhero->name }}</p>
    <p><strong>Real Name:</strong> {{ $superhero->real_name }}</p>
    <p><strong>Superhero Type:</strong> {{ $superhero->type->name ?? 'N/A' }}</p>
    <p><strong>Universe:</strong> {{ $superhero->universe->name ?? 'N/A' }}</p>

    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Back to List</a>
</body>
</html>
