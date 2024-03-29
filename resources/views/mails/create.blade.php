<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un courrier</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
    @if ($errors->any())
        <div class="errors-container bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('mail.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="subject" class="block text-gray-700 font-bold mb-2">Sujet :</label>
            <input type="text" name="subject" id="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">Statut :</label>
            <input type="text" name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="reception_date" class="block text-gray-700 font-bold mb-2">Date de réception :</label>
            <input type="date" name="reception_date" id="reception_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="dispatch_date" class="block text-gray-700 font-bold mb-2">Date d'envoi :</label>
            <input type="date" name="dispatch_date" id="dispatch_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="source" class="block text-gray-700 font-bold mb-2">Source :</label>
            <input type="text" name="source" id="source" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="file" class="block text-gray-700 font-bold mb-2">Fichier :</label>
            <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Catégorie :</label>
            <select name="category_id" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="organism" class="block text-gray-700 font-bold mb-2">Organisme :</label>
            <select name="organism_id" id="organism" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($organisms as $organism)
                    <option value="{{ $organism->id }}">{{ $organism->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter Courrier</button>
    </form>
</body>
</html>
