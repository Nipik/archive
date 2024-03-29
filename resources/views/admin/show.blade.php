<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn-return{
            position: relative;
            left: 60px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Profile de {{ $user->name }} :</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-gray-600"><strong>Nom:</strong> {{ $user->name }}</p>
                    <p class="text-gray-600"><strong>Prénom:</strong> {{ $user->lastName }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ $user->email }}</p>
                </div>
                <div class="flex justify-center items-center">
                    @if($user->image)
                        <img src="{{ asset("storage/{$user->image}") }}" alt="Profile Image" class="rounded-full h-32 w-32 object-cover" style="border: 4px solid #4299e1;">
                    @else
                        <p class="text-gray-600">Aucune image pour le moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md btn-return">Retour</a>

</body>
</html>
