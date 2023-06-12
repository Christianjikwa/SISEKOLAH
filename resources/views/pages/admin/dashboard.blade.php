@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <section class="section"><br>
        <div class="section-header">
            <h5 style = "text-align:center">Dashboard Admin</h5>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
                            <div class="card-body">
                                {{ $siswa }}
                            </div>
                        </div>
                        <a href="http://127.0.0.1:8000/siswa">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Mata Pelajaran</h4>
                            </div>
                            <div class="card-body">
                                {{ $mapel }}

                            </div>
                            <a href="http://127.0.0.1:8000/mapel">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Guru</h4>

                            </div>
                            <div class="card-body">
                                {{ $guru }}
                            </div>

                        </div>
                        <a href="http://127.0.0.1:8000/guru">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Kelas</h4>
                            </div>
                            <div class="card-body">
                                {{ $kelas }}
                            </div>
                            <a href="http://127.0.0.1:8000/kelas">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Pengumuman Terbaru</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($pengumuman as $p)
                            <div class="mb-3">
                                <h5>{{ $p->judul }}</h5>
                                <p>{{ $p->deskripsi }}</p>
                                <!-- {{-- <p>{{ $p->file }}</p> --}} -->
                                <a href="{{ asset('files/' . $p->file) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-download"></i> &nbsp; Download</a>
                                 {{-- <a href="{{ $announcement->file_url }}" target="_blank">{{ $announcement->file_name }}</a> --}}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    </section>
@endsection
