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
  @include('penyelenggara.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('penyelenggara.aside')

  <!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->
 <div class="main-content">
        @yield('content') <!-- PENTING -->
    </div>
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layout.footer')

<!-- jQuery -->
@include('layout.script')
</body>
</html>
