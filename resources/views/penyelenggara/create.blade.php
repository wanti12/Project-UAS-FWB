@extends('penyelenggara.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="mb-4">Ajukan Kegiatan</h1>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Form Pengajuan Kegiatan</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kegiatan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai" class="form-control" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4 float-right">Ajukan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
