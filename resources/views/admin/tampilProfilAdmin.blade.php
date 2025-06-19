{{-- resources/views/tampilProfil.blade.php --}}
@php
    $role = Auth::user()->role;
@endphp

@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profil Anda</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Profil Anda</strong>
                        @php
                            $user = auth()->user();
                        @endphp

                        @if ($user->role === 'pemerintah')
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-warning btn-sm float-right">Edit
                                Profil</a>
                        @elseif ($user->role === 'penyelenggara')
                            <a href="{{ route('penyelenggara.profile.edit') }}"
                                class="btn btn-warning btn-sm float-right">Edit Profil</a>
                        @endif

                    </div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $profile->nama }}</p>
                        <p><strong>Alamat:</strong> {{ $profile->alamat }}</p>
                        <p><strong>No HP:</strong> {{ $profile->no_hp }}</p>
                        <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
