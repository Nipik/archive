<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/history.css') }}">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Historique de Connexion</title>
</head>
<body>
    <div class="container">
        <h1 class="title">Historique de Connexion</h1>

        <table>
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Adresse IP</th>
                    <th>Agent Utilisateur</th>
                    <th>Heure de Connexion</th>
                    <th>Système d'Exploitation</th>
                    <th>Périphérique</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loginHistory as $history)
                    <tr>
                        <td>{{ $history->user->name }}</td>
                        <td>{{ $history->ip_address }}</td>
                        <td>{{ $history->user_agent }}</td>
                        <td>{{ $history->login_time }}</td>
                        <td>{{ $history->device_os }}</td>
                        <td>{{ $history->device_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
