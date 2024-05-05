<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails du courrier</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/mails/show.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="details-container">
        <p><strong>Sujet :</strong> {{ $mail->subject }}</p>
        <p><strong>Statut :</strong> {{ $mail->status }}</p>
        <p><strong>Date de réception :</strong> {{ $mail->reception_date }}</p>
        <p><strong>Date d'envoi :</strong> {{ $mail->dispatch_date }}</p>
        <p><strong>Source :</strong> {{ $mail->source }}</p>
        <p><strong>Catégorie :</strong>
            @if ($mail->category)
                @foreach($mail->category as $category)
                    {{ $category->name }}
                @endforeach
            @else
                Aucune catégorie associée
            @endif
        </p>
        <p><strong>Organisme :</strong>
            @if ($mail->organism)
                {{ $mail->organism->name }}
            @else
                Aucun organisme associé
            @endif
        </p>
        <p><strong>Fichier :</strong>
            @if($mail->file_path)
            <a href="{{ asset('storage/' . $mail->file_path) }}" target="_blank" class="btn-show">
                <i class="fas fa-eye"></i> Voir
            </a>
            @else
                Aucun fichier associé
            @endif
            <button id="printButton">
                <i class="fas fa-print"></i> Imprimer
            </button>
        </p>
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
