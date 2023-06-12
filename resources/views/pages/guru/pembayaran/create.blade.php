@extends('layouts.main')
@section('title', 'Pembayaran SPP')
@section('content')
<br>
<strong>Buat Pembayaran</strong><hr>
    <div class="col-lg-12">
        <form action="{{ route('bayaran.store') }}" method="post">
            @csrf
            @method('post')
            <div class="mb-3">
                <label class="form-label">Waktu Bayar</label>
                <input type="date" placeholder="Masukkan waktu pembayaran" class="form-control  @error('waktu') is-invalid @enderror"
                    name="waktu">
                @error('waktu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" placeholder="Masukkan nama siswa/i" class="form-control  @error('nama') is-invalid @enderror"
                    name="nama_siswa">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Uang</label>
                <input type="number" placeholder="MAsukkan jumlah uang" class="form-control  @error('rp') is-invalid @enderror"
                    name="rp">
                @error('rp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" placeholder="Masukkan keterangan" class="form-control  @error('keterangan') is-invalid @enderror"
                    name="keterangan">
                @error('keterangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Angkatan</label>
                <input type="text" placeholder="Masukkan tahun angkatan" class="form-control  @error('angkatan') is-invalid @enderror"
                    name="angkatan">
                @error('angkatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    <a href="{{ route('bayaran.index') }}" class="btn btn-danger btn-sm">back</a>

                </div>
            </div>
        </form>

    </div>
@endsection

