@extends('warga.master')

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            @forelse ($kegiatanDisetujui as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                            <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $item->tanggal_mulai }}</p>
                            <p class="card-text"><strong>Tanggal Selesai:</strong> {{ $item->tanggal_selesai }}</p>
                            <p class="card-text"><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                            <form action="{{ route('pendaftaran.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="kegiatan_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada kegiatan yang disetujui.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
