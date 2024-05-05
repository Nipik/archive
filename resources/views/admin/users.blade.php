<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privilèges</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        .btn {
            margin: 5px 0;
            background-color: #80a5ee;
            color: rgb(238, 238, 238);
            border-color: #80a5ee
        }
        .btn:hover {
            background-color: #80a5ee;
            border-color: #80a5ee;
            color: black;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Privilèges des utilisateurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_active ? 'Actif' : 'Désactivé' }}</td>
                        <td>
                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Activer/Désactiver</button>
                            </form>
                            <form action="{{ route('admin.users.permissions', $user->id) }}" method="post">
                                @csrf
                                <select name="can_manage_documents" class="form-control mb-2">
                                    <option value="lecteur" {{ $user->can_manage_documents === 'lecteur' ? 'selected' : '' }}>Lecteur</option>
                                    <option value="éditeur" {{ $user->can_manage_documents === 'éditeur' ? 'selected' : '' }}>Éditeur</option>
                                </select>
                                <button type="submit" class="btn btn-success">Mettre à jour</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
