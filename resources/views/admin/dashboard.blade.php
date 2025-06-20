@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Pengajuan</h3>

                                <p>lihat daftar pemngajuan kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.pengajuan') }}" class="small-box-footer">
                                lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>Daftar Kegiatan</h3>

                                <p>Lihat Daftar Kegiatan Berlangsung</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.kegiatan') }}" class="small-box-footer">lihat selengkapnya <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Warga<sup style="font-size: 20px"></sup></h3>
                                <p>Lihat Daftar Warga</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.user') }}" class="small-box-footer">
                                lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                            </a>

                        </div>
                    </div>                    
                </div>
                <div class="row">
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
