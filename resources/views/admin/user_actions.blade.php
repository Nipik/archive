<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actions des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap">
    <link rel="stylesheet" href="{{ asset('css/admin/user_action.css') }}">
</head>

<body>
    <div class="container">
        <h1>Actions des utilisateurs</h1>

        <table>
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Type d'action</th>
                    <th>Courrier concerné</th>
                    <th>Date et heure de l'action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userActions as $action)
                    <tr>
                        <td>{{ $action->user->name }}</td>
                        <td>{{ $action->action_type }}</td>
                        <td>{{ $action->mail_id ? 'Courrier ID ' . $action->mail_id : 'N/A' }}</td>
                        <td>{{ $action->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
