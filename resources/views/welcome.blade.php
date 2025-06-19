@extends('warga.master')
@section('content')
    <style>
        .fade-section {
            position: relative;
            min-height: 100vh;
            background-image: url('{{ asset('warga/images/bg-kegiatan.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .welcome-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 0 15px;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 40px 30px;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .welcome-card h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
        }

        .welcome-card p {
            font-size: 16px;
            color: #333;
            margin-bottom: 30px;
        }

        .btn-welcome {
            background-color: #ff69b4;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
        }

        .btn-welcome:hover {
            background-color: #ff4fa2;
        }
    </style>

    <div class="fade-section">
        <div class="welcome-container">
            <div class="welcome-card">
                <h1>Selamat Datang di Desa Volve</h1>
                <p>Temukan informasi lengkap tentang kegiatan Desa. Warga dapat memantau agenda kegiatan yang akan datang dan mendaftar untuk ikut berpartisipasi.</p>
                <a href="{{ route('login') }}" class="btn-welcome">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
@endsection