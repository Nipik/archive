<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('images/flyy.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/auth/index.css') }}">
    <title>Doctrack</title>
</head>
<body>
    
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf
			<input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus aria-labelledby="name" placeholder="Nom">
			    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
			<input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required autofocus aria-labelledby="lastName" placeholder="Prénom">
			    @error('lastName')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
			<input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus aria-labelledby="email" placeholder="Email">
			    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
			<input id="password" type="password" name="password" required autocomplete="current-password" aria-labelledby="password" placeholder="Mot de passe">
				@error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
			<input id="image" type="file" name="image" accept="image/*" aria-labelledby="image">
				@error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			@if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                @endif
            <br>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
			<button type="submit">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" action="{{ route('login.login') }}">
		@csrf
			 <input class="input" id="email" type="email" placeholder="Email" autocomplete="off" name="email" value="{{ old('email') }}"/>
			 <input class="input" id="password" type="password" placeholder="Mot de passe" name="password" required autocomplete="current-password"/>
			@if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                @endif
            <br>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
			<a href="{{ route('password.request') }}" class="href-forgetPassword">Mot de passe oublié?</a>
			<button class="button" id="submit" type="submit">Connexion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Vous avez déja un compte?</h1>
				<p>Si vous avez déja un compte vous pouvez se connecter!</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Créer un compte</h1>
				<p>Vous n'avez pas encore créer votre compte?</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>   
<script src="{{ asset('js/login/index.js') }}"></script>
</body>
</html>