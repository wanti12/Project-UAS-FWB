<aside class="main-sidebar elevation-4" style="background-color: #ffffff; border-right: 1px solid #dee2e6;">
    <!-- Brand Logo -->
    <div class="about_img text-center py-3 border-bottom" style="background-color: #f8f9fa;">
        <img src="{{ asset('warga/images/logo.png') }}" alt="About Image"
             class="img-fluid" style="max-width: 120px;">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image" style="width: 35px; height: 35px;">
            </div>
            <div class="info">
                <a href="#" class="d-block text-dark">
                    {{ Auth::user()->profile ? Auth::user()->profile->nama : Auth::user()->role }}
                </a>
            </div>
        </div>

        <!-- Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
                        <p class="text-dark">Dashboard</p>
                    </a>
                </li>

                <!-- Ajukan Kegiatan -->
                <li class="nav-item">
                    <a href="{{ route('kegiatan.create') }}"
                       class="nav-link {{ Request::is('kegiatan/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book text-primary"></i>
                        <p class="text-dark">Ajukan Kegiatan</p>
                    </a>
                </li>

                <!-- Status Kegiatan -->
                <li class="nav-item">
                    <a href="{{ route('kegiatan.status') }}"
                       class="nav-link {{ Request::is('status-kegiatan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book text-primary"></i>
                        <p class="text-dark">Status Kegiatan</p>
                    </a>
                </li>

                <!-- Daftar Warga -->
                <li class="nav-item">
                    <a href="{{ route('penyelenggara.daftarWarga') }}"
                       class="nav-link {{ request()->is('penyelenggara/daftar-warga') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users text-primary"></i>
                        <p class="text-dark">Daftar Warga</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
