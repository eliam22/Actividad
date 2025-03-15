<!-- resources/views/superheroes/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Superhéroe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxS1XwZmVhNfml1L0C3f4ThB2nTh91deP0HgzJ93bz3vovt4mYMf/97TQCm" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2>Crear Superhéroe</h2>

    <!-- Verificación de errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear un superhéroe -->
    <form action="{{ route('superheroes.store') }}" method="POST">
        @csrf

        <!-- Campo de nombre -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del superhéroe</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del superhéroe" value="{{ old('name') }}" required>
        </div>

        <!-- Campo de nombre real -->
        <div class="mb-3">
            <label for="real_name" class="form-label">Nombre real</label>
            <input type="text" class="form-control" id="real_name" name="real_name" placeholder="Nombre real" value="{{ old('real_name') }}" required>
        </div>

        <!-- Selección de universo -->
        <div class="mb-3">
            <label for="universe_id" class="form-label">Universo</label>
            <select class="form-control" id="universe_id" name="universe_id" required>
                <option value="">Seleccione un universo</option>
                <!-- Aquí puedes agregar las opciones de universos -->
                @foreach ($universes as $universe)
                    <option value="{{ $universe->id }}" {{ old('universe_id') == $universe->id ? 'selected' : '' }}>
                        {{ $universe->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Selección de tipo -->
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Seleccione un tipo</option>
                <!-- Aquí puedes agregar las opciones de tipo -->
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Selección de género -->
        <div class="mb-3">
            <label for="gender_id" class="form-label">Género</label>
            <select class="form-control" id="gender_id" name="gender_id" required>
                <option value="">Seleccione un género</option>
                <!-- Aquí puedes agregar las opciones de género -->
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo de poderes -->
        <div class="mb-3">
            <label for="powers" class="form-label">Poderes</label>
            <textarea class="form-control" id="powers" name="powers" rows="3" placeholder="Describe los poderes del superhéroe" required>{{ old('powers') }}</textarea>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Crear Superhéroe</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-J6qa484fS3Vg4e8p4nF+gzNN3fbsqipIn9Fw/j39ruVvJr8c5Vjdyg+mRG1gDKAn" crossorigin="anonymous"></script>
</body>
</html>

