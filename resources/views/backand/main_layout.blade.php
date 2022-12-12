<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('backand.inc.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
         @include('backand.inc.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @if (Auth::user()->is_level==1)
  @include('backand.inc.leftsidebaradmin')
  @endif
  @if (Auth::user()->is_level==2)
        @include('backand.inc.leftsidebaruser')
  @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2022 <a href="https://solusiskripsi.my.id">Zidda Miftakhur Rizqi</a></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
         @include('backand.inc.js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="GYacqlYu"></script>
</body>
</html>
