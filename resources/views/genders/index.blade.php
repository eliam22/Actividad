<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Géneros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Géneros</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genders as $gender)
                <tr>
                    <td>{{ $gender->id }}</td>
                    <td>{{ $gender->name }}</td>
                    <td>
                        <a href="{{ route('genders.edit', $gender->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('genders.destroy', $gender->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este género?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('genders.create') }}" class="btn btn-primary">Agregar Género</a>
    </div>
</body>
</html>
