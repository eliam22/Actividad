<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Género</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Género</h2>

        <!-- Formulario para editar género -->
        <form action="{{ route('genders.update', $gender->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Utilizamos PUT para el método de actualización -->
            
            <!-- Campo de nombre del género -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Género</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $gender->name) }}" required placeholder="Nombre del género">
            </div>

            <!-- Botones para guardar o cancelar -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('genders.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
