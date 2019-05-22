<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ config('app.name') }}</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         
        <style type="text/css">
            .form-signin
            {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                 
            }
            .form-signin .form-signin-heading, .form-signin .checkbox
            {
                margin-bottom: 10px;
            }
            .form-signin .checkbox
            {
                font-weight: bold;
            }
            .form-signin .form-control
            {
                position: relative;
                font-size: 16px;
                color: #fff;
                height: auto;
                padding: 10px;
                border: none;
                border-bottom: 2px solid #000000;
                
            }
            .form-signin .form-control:focus
            {
                z-index: 1;
            }
            .form-signin input[type="text"]
            {
                margin-bottom: 20px;
               background: none ;
            }
            .form-signin input[type="password"]
            {
                margin-bottom: 50px;
               
                background: none ;
            }
         .form-signin input::placeholder {
  color: #fff;
  font-size: 1.2em;
  
}
            .account-wall
            {
                margin-top: 0;
                padding: 40px 0px 20px 0px;
                background-color: transparent;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 10px 10px 60px;

            }
            .login-title
            {
                margin-top: 10%;
                color: #000;
                font-size: 25px;
                font-weight: 400;
                font-family: Times, serif; 
                display: block;
            }
            .profile-img
            {
                width: 150px;
                height: 150px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
                user-drag: none;
            }
            .need-help
            {
                margin-top: 10px;
            }
            .new-account
            {
                display: block;
                margin-top: 10px;
            }
        </style>
    </head>

    <body class="bg-dark" style="background-image:url(public/cmsp/images/back.jpg); background-repeat: no-repeat;
  background-size: cover; ">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title"><strong>Sign in to continue</strong></h1>
                    <div class="account-wall">
                        <img class="profile-img" src="{{asset('public/cmsp/images/cms.png')}}"
                             alt="" draggable="false">
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Sign in
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('register') }}" class="text-center new-account"> </a>
                </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </body>
</html>
