@extends('penyelenggara.master')

@section('content')
<div class="content-wrapper"> {{-- Tambahkan ini --}}
    <section class="content pt-3"> {{-- Section biar sesuai layout --}}
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Edit Profil</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penyelenggara.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $profile->nama) }}">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profile->alamat) }}">
                                </div>

                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $profile->no_hp) }}">
                                </div>

                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="bio" class="form-control">{{ old('bio', $profile->bio) }}</textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> {{-- Tutup content-wrapper --}}
@endsection
