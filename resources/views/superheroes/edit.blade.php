<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Superhéroe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container input,
        .form-container select {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 16px;
            background-color: #f9f9f9;
        }
        .form-container input:focus,
        .form-container select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }
        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .form-container a {
            color: #007bff;
            text-align: center;
            display: block;
            margin-top: 15px;
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
        .alert {
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Editar Superhéroe</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" id="name" value="{{ $superhero->name }}" placeholder="Nombre del superhéroe" required>
            <input type="text" name="real_name" id="real_name" value="{{ $superhero->real_name }}" placeholder="Nombre real del superhéroe" required>
            <input type="text" name="powers" id="powers" value="{{ $superhero->powers }}" placeholder="Poderes del superhéroe" required>
            <input type="text" name="origin" id="origin" value="{{ $superhero->origin }}" placeholder="Origen del superhéroe">

            <select name="universe_id" id="universe_id" required>
                <option value="">Selecciona un Universo</option>
                @foreach ($universes as $universe)
                    <option value="{{ $universe->id }}" {{ $superhero->universe_id == $universe->id ? 'selected' : '' }}>
                        {{ $universe->name }}
                    </option>
                @endforeach
            </select>

            <select name="type_id" id="type_id" required>
                <option value="">Selecciona un Tipo de Superhéroe</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $superhero->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>

            <select name="gender_id" id="gender_id" required>
                <option value="">Selecciona un Género</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}" {{ $superhero->gender_id == $gender->id ? 'selected' : '' }}>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Actualizar</button>
        </form>

        <a href="{{ route('superheroes.index') }}">Volver a la lista</a>
    </div>

</body>
</html>




