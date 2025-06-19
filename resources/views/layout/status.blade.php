@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jumlahKegiatanDiterima }}</h3>
                <p>Kegiatan Diterima</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <a href="#" class="small-box-footer">lihat selengkapnya 
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $jumlahKegiatanDitolak }}</h3>
                <p>Kegiatan Ditolak</p>
            </div>
            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <a href="#" class="small-box-footer">lihat selengkapnya 
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $jumlahKegiatanDiproses }}</h3>
                <p>Kegiatan Diproses</p>
            </div>
            <div class="icon">
                <i class="fas fa-spinner"></i>
            </div>
            <a href="#" class="small-box-footer">lihat selengkapnya 
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

@endsection
