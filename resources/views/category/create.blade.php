<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une catégorie</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Créer une catégorie</h1>
        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <div class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom:</label>
                <input type="text" id="name" name="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">Ajouter</button>
        </form>
    </div>
</body>
</html>
