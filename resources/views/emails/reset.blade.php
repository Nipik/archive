<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="{{ asset('css/email/reset.css') }}">
</head>
<body>
    <div class="container">
        <h2>Réinitialisation du mot de passe</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email">Adresse e-mail :</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmer le nouveau mot de passe :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Réinitialiser le mot de passe</button>
            </div>
        </form>
    </div>
</body>
</html>
