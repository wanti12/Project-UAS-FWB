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
                <a href="#" class="d-block text-dark">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashbordAdmin') }}"
                       class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>Dashboard Admin</p>
                    </a>
                </li>
               

                <!-- Pengajuan -->
                <li class="nav-item">
                    <a href="{{ route('admin.pengajuan') }}"
                       class="nav-link {{ request()->is('admin/pengajuan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>

                <!-- Kegiatan -->
                <li class="nav-item">
                    <a href="{{ route('admin.kegiatan') }}"
                       class="nav-link {{ request()->is('admin/kegiatan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Kegiatan</p>
                    </a>
                </li>

                <!-- Daftar Users -->
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}"
                       class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Daftar Users</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
