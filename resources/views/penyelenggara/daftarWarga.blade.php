@extends('penyelenggara.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Warga Terdaftar</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Data Pendaftaran Warga per Kegiatan</h5>
                    </div>
                    <div class="card-body">
                        @if($pendaftaran->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Warga</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Tanggal Daftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftaran as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->warga->profile->nama ?? '-' }}</td>
                                                <td>{{ $item->kegiatan->judul ?? '-' }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Belum ada warga yang mendaftar pada kegiatan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
