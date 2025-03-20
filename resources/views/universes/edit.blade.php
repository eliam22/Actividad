<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Universo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Universo</h2>

        <form action="{{ route('universes.update', $universe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Universo</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $universe->name) }}" required placeholder="Nombre del universo">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descripción del universo">{{ old('description', $universe->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('universes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
