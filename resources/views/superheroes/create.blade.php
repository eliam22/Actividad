<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Superhéroe</title>
    <link href="https://fonts.googleapis.com/css2?family=Sanctuary&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sanctuary', sans-serif;
            background-color: #f4f4f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #222;
            text-align: center;
        }

        .form-label {
            font-size: 16px;
            font-weight: 500;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #007aff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 122, 255, 0.6);
        }

        .btn {
            background-color: #007aff;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            background-color: #005f8d;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .alert ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .alert li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear un Nuevo Superhéroe</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superheroes.store') }}" method="POST">
            @csrf <!-- Token CSRF -->

            <!-- Nombre del Superhéroe -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Superhéroe</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Nombre Real -->
            <div class="mb-3">
                <label for="real_name" class="form-label">Nombre Real</label>
                <input type="text" name="real_name" id="real_name" class="form-control" value="{{ old('real_name') }}" required>
            </div>

            <!-- Universo -->
            <div class="mb-3">
                <label for="universe_id" class="form-label">Universo</label>
                <select name="universe_id" id="universe_id" class="form-control" required>
                    <option value="">Selecciona un universo</option>
                    @foreach($universes as $universe)
                        <option value="{{ $universe->id }}" {{ old('universe_id') == $universe->id ? 'selected' : '' }}>
                            {{ $universe->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tipo de Superhéroe -->
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo de Superhéroe</label>
                <select name="type_id" id="type_id" class="form-control" required>
                    <option value="">Selecciona un tipo</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Género -->
            <div class="mb-3">
                <label for="gender_id" class="form-label">Género</label>
                <select name="gender_id" id="gender_id" class="form-control" required>
                    <option value="">Selecciona un género</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                            {{ $gender->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Poderes -->
            <div class="mb-3">
                <label for="powers" class="form-label">Poderes</label>
                <textarea name="powers" id="powers" class="form-control" required>{{ old('powers') }}</textarea>
            </div>

            <!-- Afiliación -->
            <div class="mb-3">
                <label for="affiliation" class="form-label">Afiliación</label>
                <input type="text" name="affiliation" id="affiliation" class="form-control" value="{{ old('affiliation') }}">
            </div>

            <button type="submit" class="btn">Crear Superhéroe</button>
        </form>
    </div>
</body>
</html>
