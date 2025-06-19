@extends('warga.master')
@section('content')
    <style>
        .about-card {
            background: rgba(255, 255, 255, 0.9); /* transparan putih */
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_img">
                        <img src="{{ asset('warga') }}/images/about-img.png" alt="About Image">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center" style="min-height: 450px;">
                    <div class="about-card">
                        <h1 class="about_taital">About DesaVolve</h1>
                        <p class="about_text">
                            Desavolve adalah platform digital yang dirancang untuk memberdayakan masyarakat desa melalui
                            akses informasi yang transparan dan layanan yang terintegrasi. Kami menghadirkan solusi modern
                            untuk mendukung pengelolaan kegiatan, komunikasi antar warga, serta keterlibatan aktif dalam
                            pembangunan desa. Dengan Desavolve, setiap warga dapat lebih mudah terhubung dengan pemerintah
                            desa, mengikuti berbagai kegiatan, dan memberikan aspirasinya secara langsung.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
