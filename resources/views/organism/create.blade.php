<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Organism</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{asset('css/admin/organismeCreate.css') }}">
</head>
<body>
    <div class="container">
        <h1>Créer un organisme</h1>
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('organisms.store') }}" method="post">
            @csrf
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name">

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address">

            <label for="fax">Fax:</label>
            <input type="text" id="fax" name="fax">

            <label for="tel">Téléphone:</label>
            <input type="text" id="tel" name="tel">

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
