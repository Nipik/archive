<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/flyy.png') }}">
    <title>@yield('title', 'Archive')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .folder-icon {
            color: #9682ef;
        }
        .category-name:hover{
            color: #9682ef;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-black shadow p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-lg font-bold">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" />
                </a>
            </div>
        </nav>
        <main class="container mx-auto flex-grow p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
