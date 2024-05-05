<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
</head>
<body>
    <div class="wrapper">
      <form method="POST" action="{{ route('add.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-field">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus aria-labelledby="name">
                <label for="name">Nom</label>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
                <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required autofocus aria-labelledby="lastName">
                <label for="lastName">Prénom</label>
                @error('lastName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus aria-labelledby="email">
                <label for="email">Email</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
              <input id="password" type="password" name="password" required autocomplete="current-password" aria-labelledby="password">
                <label for="password">Mot de passe</label>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
              <label for="image" class="image-label">{{ __('Profile Image') }}</label>
              <input id="image" type="file" name="image" accept="image/*" aria-labelledby="image">
              @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
          @endif
            <button type="submit">Ajouter</button>
            <a href="{{route('admin.index')}}" class="home">Retour</a>
        </form>
    </div>
</body>
</html>
