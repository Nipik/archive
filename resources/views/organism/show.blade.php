<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organism Details</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de l'organisme</h1>
        <p><strong>Nom:</strong> {{ $organism->name }}</p>
        <p><strong>Address:</strong> {{ $organism->address }}</p>
        <p><strong>Fax:</strong> {{ $organism->fax }}</p>
        <p><strong>Téléphone:</strong> {{ $organism->tel }}</p>
        <a href="{{ route('organisms.index') }}" class="btn btn-primary">Revenir à la liste des organismes</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
