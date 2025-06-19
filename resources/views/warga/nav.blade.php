<style>
    .navbar-custom {
        background: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 15px 20px;
        border-radius: 10px;
    }

    .navbar-custom .nav-link {
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .navbar-custom .nav-link:hover {
        color: #ff69b4;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 24px;
        color: #ff69b4;
    }

    .btn-outline-primary {
        border-color: #ff69b4;
        color: #ff69b4;
    }

    .btn-outline-primary:hover {
        background-color: #ff69b4;
        color: white;
    }

    .btn-secondary {
        background-color: #ff69b4;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #ff4fa2;
    }

    .dropdown-menu {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item:hover {
        background-color: #fce4ec;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler:focus {
        outline: none;
        box-shadow: none;
    }

    /* Menghilangkan titik/bullet di profil */
    .navbar-nav li,
    .dropdown-menu li {
        list-style: none;
    }
</style>

<div class="container mt-3">
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="about_img text-end">
            <img src="{{ asset('warga/images/logo.png') }}" alt="About Image" class="img-fluid" style="max-width: 150px;">
        </div>
        {{-- <a class="navbar-brand" href="#"><b>DesaVolve</b></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Auth::check() ? route('warga.home') : route('login') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Auth::check() ? route('warga.about') : route('login') }}">About</a>
                </li>
                <li class="nav-item {{ request()->is('activity') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ Auth::check() ? route('warga.activity') : route('login') }}">Activity</a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item ml-lg-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary my-2 my-sm-0">Log in</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item ml-lg-2">
                            <a href="{{ route('register') }}" class="btn btn-secondary my-2 my-sm-0">Register</a>
                        </li>
                    @endif
                @else
                    @if (Auth::user()->role === 'warga')
                        <li class="nav-item dropdown ml-lg-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                data-toggle="dropdown">
                                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" alt="User Image" width="36"
                                    height="36" class="rounded-circle mr-2" style="object-fit: cover;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('profile.show') }}" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
</div>
