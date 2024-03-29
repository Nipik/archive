<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails du courrier</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #aed0f4;
            margin: 0;
            padding: 0;
            animation: floatAnimation 2s infinite alternate;
            position: relative;
            top: 40px;
        }

        @keyframes floatAnimation {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-10px);
            }
        }

        h1 {
            color: #000000;
            text-align: center;
            margin-top: 20px;
        }

        .details-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .details-container p {
            margin-bottom: 10px;
        }

        .details-container strong {
            color: #555;
        }

        .details-container button {
            background-color: #aed0f4;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            position: relative;
            left: 10px;
            transition: all 0.3s ease-in-out;
        }

        .details-container button:hover {
            background-color: #71a2d6;
            transform: translateY(-5px);
        }

        .btn-show {
            color: #000000;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Détails du courrier</h1>
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
                <a href="{{ asset('storage/' . $mail->file_path) }}" target="_blank" class="btn-show">Voir</a>
            @else
                Aucun fichier associé
            @endif
            <button id="printButton">Imprimer</button>
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
