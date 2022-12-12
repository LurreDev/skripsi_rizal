<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('backand.inc.head')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
    <a href="#"><b>Form Login</b></a>
    </div>
    
    <div class="card">
    <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block">Log in</button>
    </div>
    
    </div>
    </form>
    <p class="mb-0">
    <a href="{{ url('register')}}" class="text-center">register</a>
    </p>
    </div>
    
    </div>
    </div>


@include('backand.inc.js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="GYacqlYu"></script>
</body>
</html>

