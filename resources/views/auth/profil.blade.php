<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-center mb-6">
                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="rounded-full h-32 w-32 object-cover border-4 border-green-500 shadow-md">
                @else
                    <p class="text-gray-600">Aucune image pour le moment.</p>
                @endif
            </div>
            <h2 class="text-2xl font-bold mb-4 text-center">Profile de {{ auth()->user()->name }}</h2>
            <form action="{{ route('profile.update', auth()->id()) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2"><i class="fas fa-user"></i> Informations de contact</h3>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nom:</label>
                        <div class="relative">
                            <i class="fas fa-signature absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="lastName" class="block text-gray-700 font-medium mb-2">Prénom:</label>
                        <div class="relative">
                            <i class="fas fa-signature absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="text" id="lastName" name="lastName" value="{{ old('lastName', auth()->user()->lastName) }}" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                <!-- Section de modification du mot de passe -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2"><i class="fas fa-key"></i> Modifier le mot de passe</h3>

                    <div class="mb-4">
                        <label for="current_password" class="block text-gray-700 font-medium mb-2">Mot de passe actuel:</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="password" id="current_password" name="current_password" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700 font-medium mb-2">Nouveau mot de passe:</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="password" id="new_password" name="new_password" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Confirmer le nouveau mot de passe:</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            <input type="password" id="confirm_password" name="confirm_password" class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:border-purple-500 focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold mb-2"><i class="fas fa-camera"></i> Image de profile</h3>

                    <div class="relative">
                        <i class="fas fa-file-upload absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 bg-gray-200 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded file:border-none file:bg-gray-300 file:text-sm file:font-semibold file:text-gray-900 hover:file:bg-gray-400 pl-10">
                    </div>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors duration-200 ease-in-out">Modifier</button>
            </form>
        </div>
    </div>
</body>

</html>
