@extends('warga.master')

@section('content')
    <div class="content-wrapper d-flex align-items-center justify-content-center"
         style="min-height: 100vh; background: transparent;">
        <section class="content w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-header bg-primary text-white rounded-top-4">
                                <h5 class="mb-0">Edit Profil</h5>
                            </div>
                            <div class="card-body p-4">

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

                                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 col-form-label fw-semibold">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" class="form-control rounded-pill"
                                                   value="{{ old('nama', $profil->nama) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 col-form-label fw-semibold">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alamat" class="form-control rounded-pill"
                                                   value="{{ old('alamat', $profil->alamat) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 col-form-label fw-semibold">No HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_hp" class="form-control rounded-pill"
                                                   value="{{ old('no_hp', $profil->no_hp) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-sm-3 col-form-label fw-semibold">Bio</label>
                                        <div class="col-sm-9">
                                            <textarea name="bio" rows="3"
                                                      class="form-control rounded-3">{{ old('bio', $profil->bio) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success rounded-pill px-4">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
