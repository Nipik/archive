<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Mes Courriers</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Mes Courriers</h1>

        @if($mails->isEmpty())
            <p class="text-center text-gray-600">Vous n'avez pas de courriers.</p>
        @else
            <ul class="space-y-6">
                @foreach ($mails as $mail)
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow duration-200">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-envelope-open text-blue-500 mr-2"></i>
                        <p class="font-semibold"><strong>Sujet:</strong> {{ $mail->subject }}</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-clipboard-list text-green-500 mr-2"></i>
                        <p class="text-gray-700"><strong>Statut:</strong> {{ $mail->status }}</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-calendar-alt text-red-500 mr-2"></i>
                        <p class="text-gray-700"><strong>Date de réception:</strong> {{ $mail->reception_date }}</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-paper-plane text-yellow-500 mr-2"></i>
                        <p class="text-gray-700"><strong>Date d'envoi:</strong> {{ $mail->dispatch_date }}</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-file-alt text-purple-500 mr-2"></i>
                        <p class="text-gray-700"><strong>Source:</strong> {{ $mail->source }}</p>
                        <br>
                    </div>
                    <br><a href="{{ route('mail.show', $mail->id) }}" class="mt-4 bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Voir le courrier</a>
                </div>
                @endforeach
            </ul>
        @endif
    </div>
</body>

</html>
