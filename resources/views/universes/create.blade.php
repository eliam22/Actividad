<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Universe</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Create a New Universe</h1>

        <!-- Show validation errors -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to create a universe -->
        <form action="{{ route('universes.store') }}" method="POST">
            @csrf <!-- Token de seguridad de Laravel -->

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Universe Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create Universe</button>
            </div>
        </form>

        <!-- Redirect to universes list after creation -->
        <div class="mt-4">
            <a href="{{ route('universes.index') }}" class="text-blue-500 hover:text-blue-700">Back to Universes List</a>
        </div>
    </div>
</body>
</html>

