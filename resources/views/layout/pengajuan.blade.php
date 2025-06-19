@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <h2 class="font-weight-bold">Daftar Pengajuan Kegiatan</h2>
                </div>
            </div>

            {{-- Alert jika ada pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @if ($kegiatan->isEmpty())
                        <p>Tidak ada kegiatan yang diajukan.</p>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Lokasi</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->tanggal_mulai }}</td>
                                        <td>{{ $item->tanggal_selesai }}</td>
                                        <td>{{ $item->lokasi }}</td>

                                        <td>
                                            {{-- Tombol Aksi --}}
                                            <form action="{{ route('pengajuan.updateStatus', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="disetujui">
                                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                            </form>

                                            <form action="{{ route('pengajuan.updateStatus', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="ditolak">
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                            <form action="{{ route('pengajuan.updateStatus', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="diajukan">
                                                <button type="submit" class="btn btn-warning btn-sm">Proses</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
