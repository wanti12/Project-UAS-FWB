<!-- master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Application</title>
  <!-- Link ke CSS dan asset lainnya -->
  @include('layout.css') <!-- Ini adalah bagian untuk link ke file CSS (Bootstrap, dll) -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('layout.header') <!-- Bagian header -->
    @include('layout.sidebar') <!-- Bagian sidebar -->

    <div class="content-wrapper">
      @yield('content') <!-- Konten dinamis halaman yang akan diisi pada halaman spesifik -->
    </div>

    @include('layout.footer') <!-- Bagian footer -->

  </div>
  <!-- ./wrapper -->

  @include('layout.script') <!-- Script JS yang digunakan pada seluruh aplikasi -->
</body>

</html>