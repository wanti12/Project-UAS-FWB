@extends('penyelenggara.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Status Kegiatan</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Daftar Kegiatan yang Diajukan</h5>
                    </div>
                    <div class="card-body">
                        @if($kegiatans->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kegiatans as $index => $kegiatan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $kegiatan->judul }}</td>
                                                <td>{{ $kegiatan->deskripsi}}</td>
                                                <td>{{ $kegiatan->tanggal_mulai }}</td>
                                                <td>{{ $kegiatan->tanggal_selesai }}</td>
                                                <td>{{ $kegiatan->lokasi }}</td>
                                                <td>
                                                    <span class="badge 
                                                        @if($kegiatan->status == 'diajukan') badge-warning 
                                                        @elseif($kegiatan->status == 'disetujui') badge-success 
                                                        @elseif($kegiatan->status == 'ditolak') badge-danger 
                                                        @else badge-secondary 
                                                        @endif">
                                                        {{ ucfirst($kegiatan->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Belum ada kegiatan yang diajukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
