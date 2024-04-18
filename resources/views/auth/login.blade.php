<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<style>
    body {
    background: url('https://images.unsplash.com/photo-1534408679207-69b9615e55a7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&s=cfbabd80cd2d5cae495a2a732d473562') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.card {
    width: 40%;
}
</style>

</head>

<body class="">

    <div class="container mt-5 pt-5">
        <div class="card mx-auto border-0">
          <div class="card-header border-bottom-0 bg-transparent">
            <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
                   aria-selected="true">Se Connecter</a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
                   aria-selected="false">Créer mon Compte</a>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <h5 class="text-center">Bienvenue</h5>
                {{-- @isset($sms)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $sms}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endisset --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- <p class="text-center">Connexion ou création de compte en 1 minute</p> --}}

              <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-envelope"></i></div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Adresse Email" class="form-control" required autofocus>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-asterisk"></i></div>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                            @if (Route::has('password.request'))
                            <label class="pull-right">
                                <a href="{{ route('password.request') }}">Mot de Passe oublier?</a>
                            </label>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Connexion</button>

                        {{-- <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                        </div> --}}
                    </form>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">

                <div class="login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-user"></i></div>
                                <input type="text" id="name" value="{{ old('name') }}" name="name" placeholder="Entrez votre name" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-envelope"></i></div>
                                <input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Entrez votre Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-asterisk"></i></div>
                                <input type="password" id="password" name="password" placeholder="Entrez votre Mot de Passe" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon bg-primary text-white"><i class="fa fa-asterisk"></i></div>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer votre Mot de Passe" class="form-control" required>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> J'accepte les termes et conditions.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Enregistrer</button>
                        {{-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                            </div>
                        </div> --}}
                        {{-- <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ route('login') }}"> Sign in</a></p>
                        </div> --}}
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    {{-- <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                            @if (Route::has('password.request'))
                            <label class="pull-right">
                                <a href="{{ route('password.request') }}">Forgotten Password?</a>
                            </label>
                            @endif

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>


</body>

</html>
