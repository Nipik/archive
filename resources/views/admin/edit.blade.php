<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <title>Edit</title>
</head>
<body>
    <div class="wrapper">
      <form action="{{ route('admin.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
			@method('put')
            <div class="input-field">
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}">
                <label for="name">Nom</label>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
                <input id="lastName" type="text" name="lastName" value="{{ old('lastName', $user->lastName) }}">
                <label for="lastName">Prénom</label>
                @error('lastName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
                <label for="email">Email</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-field">
              <label for="image" class="image-label">{{ __('Profile Image') }}</label>
			  <input type="file" name="image" id="image">
              @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
          @endif
            <button type="submit">Modifier</button>
            <a href="{{route('admin.index')}}" class="home">Retour</a>
        </form>
    </div>
</body>
</html>
