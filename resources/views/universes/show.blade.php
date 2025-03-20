<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Universo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-4xl font-semibold mb-6 text-center text-gray-800">Detalles del Universo</h1>
        
        <div class="bg-white shadow-lg rounded-lg p-6">
            <p class="text-lg"><strong>ID:</strong> {{ $universe->id }}</p>
            <p class="text-lg"><strong>Nombre:</strong> {{ $universe->name }}</p>
            <p class="text-lg"><strong>Descripción:</strong> {{ $universe->description }}</p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('universes.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition">Volver</a>
        </div>
    </div>
</body>
</html>
