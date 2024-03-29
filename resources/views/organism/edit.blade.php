<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organism</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modifier un organisme</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('organisms.update', $organism->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $organism->name }}">
            </div>
            <div class="form-group">
                <label for="address">Adresse:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $organism->address }}">
            </div>
            <div class="form-group">
                <label for="fax">Fax:</label>
                <input type="text" id="fax" name="fax" class="form-control" value="{{ $organism->fax }}">
            </div>
            <div class="form-group">
                <label for="tel">Téléphone:</label>
                <input type="text" id="tel" name="tel" class="form-control" value="{{ $organism->tel }}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
