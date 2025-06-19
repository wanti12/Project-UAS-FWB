@extends('warga.master')

@section('content')
    <div class="content-wrapper" style="min-height: 100vh; background: transparent;">
        <section class="content pt-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <strong>Profil Anda</strong>
                                <a href="{{ route('profil.edit') }}" class="btn btn-warning btn-sm">Edit Profil</a>
                            </div>
                            <div class="card-body">
                                <p><strong>Nama:</strong> {{ $profile->nama }}</p>
                                <p><strong>Alamat:</strong> {{ $profile->alamat }}</p>
                                <p><strong>No HP:</strong> {{ $profile->no_hp }}</p>
                                <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
