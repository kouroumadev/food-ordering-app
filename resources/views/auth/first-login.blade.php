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
    <link rel="stylesheet" href="{{ asset('theme/vendors/jqvmap/dist/jqvmap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('theme/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('gerant.newPswd') }}">
                        @csrf

                        <div class="form-group">
                            <label>Ancien mot de Pass</label>
                            <input readonly type="text" value="{{ $user->pass }}" class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de Pass</label>
                            <input required type="password" class="form-control" name="new_password" autofocus>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <div class="form-group">
                            <label>Confirmer le Nouveau mot de Pass</label>
                            <input required type="password" class="form-control" name="c_password" placeholder="" autofocus>
                        </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-15">Valider</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>


</body>

</html>
