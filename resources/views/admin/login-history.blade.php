<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Historique de Connexion</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #000;
            color: #0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #0f0;
        }
        table {
            width: 100%; 
            border-collapse: collapse;
            border: 1px solid #0f0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #0f0;
        }
        th {
            background-color: #090;
            font-weight: bold;
            color: #0f0;
        }
        tr:nth-child(even) {
            background-color: #000;
        }
        tr:hover {
            background-color: #111;
        }
    </style>
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
