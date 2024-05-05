<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Profiles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/admin/liste.css') }}">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-11"> 
                <div class="card">
                    <div class="card-header">Profile des utilisateurs</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Actions</th>
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
                                                <img src="{{ asset('storage/' . $user->image) }}" alt="Image de profil" class="profile-img">
                                            @else
                                                Aucune image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit', $user) }}" class="btn btn-secondary btn-sm btn-apparence">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.confirm-delete', $user) }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href="{{ route('admin.show', $user) }}" class="btn btn-secondary btn-sm btn-apparence">
                                                <i class="fas fa-eye"></i>
                                            </a>
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

    <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg btn-apparence btn-right">
            <i class="fas fa-arrow-left"></i> 
        </a>
        <a href="{{ route('add') }}" class="btn btn-secondary btn-lg btn-apparence btn-left">
            <i class="fas fa-plus"></i> 
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
