<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisms</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .btn-details {
            margin-left: 10px;
        }
        .href-manage{
            position: relative;
            left: 1px;
            top: 20px;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .list-group-item .buttons {
            display: flex;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Organismes</h1>
        <a href="{{ route('organisms.create') }}" class="btn btn-primary mb-3">Ajouter un organisme</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <ul class="list-group">
            @foreach($organisms as $organism)
                <li class="list-group-item">
                    <span>{{ $organism->name }}</span>
                    <span class="buttons">
                        <form action="{{ route('organisms.destroy', $organism->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Supprimer</button>
                        </form>
                        <a href="{{ route('organisms.edit', $organism->id) }}" class="btn btn-primary btn-sm ml-2">Modifier</a>
                        <a href="{{ route('organisms.show', $organism->id) }}" class="btn btn-info btn-sm ml-2 btn-details">Voir</a>
                    </span>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('admin.dashboard') }}" class="href-manage">Retour</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
