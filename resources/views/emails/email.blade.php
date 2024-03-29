<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" href="{{ asset('images/flyy.png') }}">
    <link rel="stylesheet" href="{{ asset('css/email/email.css') }}">
</head>
<body>
    <div class="container">
        <h2>Réinitialisation du Mot de Passe</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <label for="email">Adresse e-mail :</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <button type="submit">Envoyer le lien</button>
            </div>
        </form>

        @if ($errors->any())
        <div class="alert">
            <div>
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
        @endif

        @if (session('status'))
        <div class="alert success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</body>
</html>
