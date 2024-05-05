<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du courrier</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/mails/show.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Ajoutez Tailwind CSS pour plus de flexibilité dans le style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Détails du courrier</h2>
        <div class="space-y-4">
            <p class="flex items-center"><i class="fas fa-envelope mr-2 text-blue-500"></i> <strong>Sujet :</strong> {{ $mail->subject }}</p>
            <p class="flex items-center"><i class="fas fa-clipboard-check mr-2 text-green-500"></i> <strong>Statut :</strong> {{ $mail->status }}</p>
            <p class="flex items-center"><i class="fas fa-calendar-alt mr-2 text-red-500"></i> <strong>Date de réception :</strong> {{ $mail->reception_date }}</p>
            <p class="flex items-center"><i class="fas fa-calendar-day mr-2 text-yellow-500"></i> <strong>Date d'envoi :</strong> {{ $mail->dispatch_date }}</p>
            <p class="flex items-center"><i class="fas fa-info-circle mr-2 text-indigo-500"></i> <strong>Source :</strong> {{ $mail->source }}</p>
            <p class="flex items-center"><i class="fas fa-tags mr-2 text-purple-500"></i> <strong>Catégorie :</strong>
                @if ($mail->category)
                    @foreach($mail->category as $category)
                        {{ $category->name }}
                    @endforeach
                @else
                    Aucune catégorie associée
                @endif
            </p>
            <p class="flex items-center"><i class="fas fa-building mr-2 text-teal-500"></i> <strong>Organisme :</strong>
                @if ($mail->organism)
                    {{ $mail->organism->name }}
                @else
                    Aucun organisme associé
                @endif
            </p>
            <p class="flex items-center">
                <i class="fas fa-file-alt mr-2 text-orange-500"></i> <strong>Fichier :</strong>
                @if($mail->file_path)
                    <a href="{{ asset('storage/' . $mail->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-eye mr-2"></i> Voir
                    </a>
                @else
                    Aucun fichier associé
                @endif
                <button id="printButton" class="ml-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                    <i class="fas fa-print mr-2"></i> Imprimer
                </button>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            var url = "{{ asset('storage/' . $mail->file_path) }}";
            var newWindow = window.open(url);
            newWindow.onload = function() {
                newWindow.print();
            };
        });
    </script>
</body>

</html>
