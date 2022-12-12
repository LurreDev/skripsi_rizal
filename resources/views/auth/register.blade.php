<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('backand.inc.head')
</head>
<body class="hold-transition register-page">
    <div class="register-box">
    <div class="register-logo">
    <a href="https://solusiskripsi.my.id/"><b>Form Register</b></a>
    </div>
    <div class="card">
    <div class="card-body register-card-body">
    <p class="login-box-msg">Register untuk penguna baru</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <div class="input-group mb-3">
    <input type="text" class="form-control" name="name" placeholder="Full name">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-user"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input type="email" class="form-control"  name="email" placeholder="Email">
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
    <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password"  required autocomplete="new-password">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block">Register</button>
    </div>
    
    </div>
    </form>
     
    <a href="{{ url('login')}}" class="text-center">LOGIN</a>
    </div>
    
    </div>
    </div>

    @include('backand.inc.js')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="GYacqlYu"></script>
    </body>
    </html>
    