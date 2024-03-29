<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/liste.css') }}">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <title>Users Profiles</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile des utilisateurs</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="id-th">Id</th>
                                    <th class="name-th">Nom</th>
                                    <th class="lastName-th">Prénom</th>
                                    <th class="email-th">Email</th>
                                    <th class="image-th">Image</th>
                                    <th class="action-th">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastName }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->image)
                                                <img src="{{ asset("storage/{$user->image}") }}" alt="Image de profil" width="50">
                                            @else
                                                Aucune image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit', $user) }}" class="btn btn-primary">Modifier</a>
                                            <a href="{{ route('admin.confirm-delete', $user) }}" class="btn btn-danger">Supprimer</a>
                                            <a href="{{ route('admin.show', $user) }}" class="btn btn-second">Voir</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn-logout">Retour</a>
    <a href="{{ route('add') }}" class="btn-logout add-btn">Ajouter</a>
    @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
        @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
