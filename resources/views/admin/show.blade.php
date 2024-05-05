<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile de {{ $user->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/admin/show.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-card">
                    <div class="card-header profile-heading">
                        Profile de {{ $user->name }}
                    </div>
                    <div class="card-body profile-details">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if($user->image)
                                    <img src="{{ asset("storage/{$user->image}") }}" alt="Profile Image" class="profile-image">
                                @else
                                    <p>Aucune image pour le moment.</p>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <p><span class="profile-label">ID:</span> {{ $user->id }}</p>
                                <p><span class="profile-label">Nom:</span> {{ $user->name }}</p>
                                <p><span class="profile-label">Prénom:</span> {{ $user->lastName }}</p>
                                <p><span class="profile-label">Email:</span> {{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
