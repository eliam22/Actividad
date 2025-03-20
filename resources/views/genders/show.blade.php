<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Género</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-4xl font-semibold mb-6 text-center text-gray-800">Detalles del Género</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg"><strong>ID:</strong> {{ $gender->id }}</p>
            <p class="text-lg"><strong>Nombre:</strong> {{ $gender->name }}</p>
            
            <div class="mt-6 flex justify-between">
                <a href="{{ route('genders.index') }}" 
                   class="bg-gray-500 text-white px-6 py-2 rounded shadow hover:bg-gray-700">
                   Volver
                </a>
                <a href="{{ route('genders.edit', $gender->id) }}" 
                   class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                   Editar
                </a>
            </div>
        </div>
    </div>
</body>
</html>

