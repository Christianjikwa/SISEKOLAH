@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Selamat datang | {{ Auth::user()->name }}</h1>
    </div>

    <div class="section-body">
        <div class="row ">
            {{-- Jadwal --}}
            <div class="col-10 col-sm-10 col-lg-4">
                <div class="card card-hero">
                     <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <p><b>Jadwal Mengajar</b></p><hr">
                        <p>Berikut list jadwal kelas tempat mengajaar anda</p>
                    </div>

                    <div class="card-body p-0">
                        <p>Jadwal Mengajar</p>
                        <div class="tickets-list">
                            @foreach ($jadwal as $data )
                            @if($data->hari == $hari)
                            <div class="ticket-item">
                                <div class="ticket-title">
                                    <h4>{{ $data->kelas->nama_kelas }}</h4>
                                </div>
                                <div class="ticket-info">
                                    <div class="text-primary">Pada jam {{ $data->dari_jam }}</div>
                                </div>
                            </div>
                            @else
                            <div class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Tidak ada jadwal mengajar hari ini</h4>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Materi Diajarkan</h4>

                        </div>
                        <div class="card-body">
                            {{ $materi }}

                        </div>
                        <a href="http://127.0.0.1:8000/materi">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Tugas diberikan</h4>
                        </div>
                        <div class="card-body">
                            {{ $tugas }}
                        </div>
                        <a href="http://127.0.0.1:8000/tugas">Lihat Selengkapnya</a>
                    </div>
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
</section>
@endsection
