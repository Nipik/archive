<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-900">
    <nav class="bg-black p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-bold"><img src="{{ asset('images/logo.png') }}" /></a>
        </div>
    </nav>
    <div class="container mx-auto p-4 flex">
        <aside class="w-1/4 bg-white shadow-md rounded-lg p-4">
            <ul class="space-y-4">
                <li><a href="{{ route('mail.index') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                    <i class="fas fa-envelope mr-2"></i> Courrier
                </a></li>
                <li><a href="{{ route('archive.index') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                    <i class="fas fa-folder mr-2"></i> Archive
                </a></li>
                <li>
                    <a href="{{ route('myMail.index') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                        <i class="fas fa-paper-plane mr-2"></i> Mes courriers
                </a></li>
                <li>
                    <a href="{{ route('profile') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                        <i class="fas fa-user mr-2"></i> Profile
                </a></li>
                @if(auth()->user()->role === 'admin')
                <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                        <i class="fas fa-cogs mr-2"></i> Tableau de bord
                </a></li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center text-gray-700 hover:text-blue-500">
                        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                </a></li>
                <li>
            </ul>
        </aside>
        <main class="flex-grow bg-white shadow-md rounded-lg p-6 ml-4">
            <h1 class="text-2xl font-bold mb-4">Bienvenue {{ auth()->user()->name }}!</h1>
            <p>Choisissez l'une des options ci-dessous pour commencer :</p>

            <div class="grid grid-cols-2 gap-6 mt-6">
                <div class="bg-blue-200 rounded-lg p-4 flex items-center hover:shadow-lg transition-shadow duration-200">
                    <i class="fas fa-envelope fa-2x text-blue-700 mr-4"></i>
                    <div>
                        <a href="{{ route('mail.index') }}" class="text-xl font-bold text-blue-700">Courrier</a>
                    </div>
                </div>
                <div class="bg-purple-200 rounded-lg p-4 flex items-center hover:shadow-lg transition-shadow duration-200">
                    <i class="fas fa-folder fa-2x text-purple-700 mr-4"></i>
                    <div>
                        <a href="{{ route('archive.index') }}" class="text-xl font-bold text-purple-700">Archive</a>
                    </div>
                </div>
                <div class="bg-pink-200 rounded-lg p-4 flex items-center hover:shadow-lg transition-shadow duration-200">
                    <i class="fas fa-paper-plane fa-2x text-pink-700 mr-4"></i>
                    <div>
                        <a href="{{ route('myMail.index') }}" class="text-xl font-bold text-pink-700">Mes Courriers</a>
                    </div>
                </div>
                <div class="bg-green-200 rounded-lg p-4 flex items-center hover:shadow-lg transition-shadow duration-200">
                    <i class="fas fa-user fa-2x text-green-700 mr-4"></i>
                    <div>
                        <a href="{{ route('profile') }}" class="text-xl font-bold text-green-700">Profile</a>
                    </div>
                </div>
                @if(auth()->user()->role === 'admin')
                <div class="bg-red-200 rounded-lg p-4 flex items-center hover:shadow-lg transition-shadow duration-200">
                    <i class="fas fa-cogs fa-2x text-red-700 mr-4"></i>
                    <div>
                            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-red-700">Tableau de bord</a>
                    </div>
                </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
