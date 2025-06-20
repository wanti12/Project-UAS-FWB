<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('Admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layout.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layout.aside')

 
 @yield('content')

@include('layout.footer')

<!-- jQuery -->
@include('layout.script')
</body>
</html>
