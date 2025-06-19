@extends('warga.master')
@section('content')
    <style>
        .mySlide {
            display: none;
            animation: fade 1s;
            position: relative;
        }

        .fade-container {
            position: relative;
            min-height: 650px;
            background-size: cover;
            background-position: center;
            padding-bottom: 100px;
        }

        .glass-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.6);
            z-index: 1;
        }

        .banner_section {
            position: relative;
            z-index: 2;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fade {
            from {
                opacity: 0.4;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <div class="fade-container" style="background-image: url('{{ asset('warga/images/bg-kegiatan.jpg') }}');">
        @foreach ($kegiatanDisetujui as $item)
            <div class="mySlide">
                {{-- Overlay transparan --}}
                <div class="glass-overlay"></div>

                <div class="banner_section layout_padding">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="glass-card">
                                    <h1 class="banner_taital" style="font-size: 32px; color: #222;">
                                        {{ $item->judul }}
                                    </h1>
                                    <p class="banner_text" style="color: #333;">
                                        {{ $item->deskripsi }}
                                    </p>
                                    @guest
                                        <div class="started_text">
                                            <a href="{{ route('login') }}" class="btn btn-pink"
                                                style="background-color: #ff69b4; color: white;">Daftar sekarang</a>
                                        </div>
                                    @else
                                        <div class="started_text mt-3">
                                            <a href="{{ route('warga.activity') }}" class="btn btn-primary">Daftar sekarang</a>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="banner_img">
                                    <img src="{{ asset('warga/images/banner-img.png') }}" class="img-fluid"
                                        alt="Gambar Kegiatan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        let slideIndex = 0;
        const slides = document.getElementsByClassName("mySlide");

        function showSlides() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 4000);
        }

        showSlides();
    </script>
@endsection
