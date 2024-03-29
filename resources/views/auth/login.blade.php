<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('images/flyy.png') }}" rel="icon">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>
<div class="form" id="form">
  <div class="field email">
	<form method="POST" action="{{ route('login.login') }}">
            @csrf
            <div class="icon"></div>
            <input class="input" id="email" type="email" placeholder="Email" autocomplete="off" name="email" value="{{ old('email') }}"/>
        </div>
        <div class="field password">
            <div class="icon"></div>
            <input class="input" id="password" type="password" placeholder="Mot de passe" name="password" required autocomplete="current-password"/>
        </div>
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
        <button class="button" id="submit" type="submit">Connexion
            <div class="side-top-bottom"></div>
            <div class="side-left-right"></div>
        </button>
        <a href="{{ route('password.request') }}" class="return-href">Mot de passe oublié?</a>
	</form>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
