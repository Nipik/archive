<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .href-manage{
            position: relative;
            left: 1070px;
            top: -750px;
            font-size: 17px;
            text-decoration: underline;
            color: rgb(57, 165, 248);
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Catégories</h1>
        <a href="{{ route('category.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600">Ajouter une catégorie</a>
        @if(session('success'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @foreach($categories as $category)
            <div class="bg-white shadow-sm rounded-md p-4 mt-4 flex justify-between items-center">
                <span>{{ $category->name }}</span>
                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-md shadow-sm hover:bg-red-600">Supprimer</button>
                </form>
            </div>
        @endforeach
    </div>
    <a href="{{ route('admin.dashboard') }}" class="href-manage">Retour</a>
</body>
</html>
