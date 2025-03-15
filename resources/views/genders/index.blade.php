<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Géneros</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-4xl font-semibold mb-6 text-center text-gray-800">Lista de Géneros</h1>
        
        <div class="overflow-hidden rounded-xl shadow-lg bg-white">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-4 text-lg">ID</th>
                        <th class="p-4 text-lg">Nombre</th>
                        <th class="p-4 text-lg text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach($genders as $gender)
                    <tr class="hover:bg-gray-200 transition">
                        <td class="p-4 text-gray-700">{{ $gender->id }}</td>
                        <td class="p-4 text-gray-700 font-medium">{{ $gender->name }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('genders.edit', $gender->id) }}" class="text-blue-600 hover:text-blue-800 transition">Editar</a>
                            <form action="{{ route('genders.destroy', $gender->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition ml-4" onclick="return confirm('¿Seguro que deseas eliminar este género?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('genders.create') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition">Agregar Género</a>
        </div>
    </div>
</body>
</html> 