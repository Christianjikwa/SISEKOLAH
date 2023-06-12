@extends('layouts.main')
@section('title', 'Pembayaran SPP')
@section('content')
<br>
<strong>Buat Pembayaran</strong><hr>
    <div class="col-lg-12">
        <form method="POST" action="{{ route('bayaran.update', $pembayaran->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $pembayaran->waktu }}" required>
            </div>
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $pembayaran->nama_siswa }}" required>
            </div>
            <div class="form-group">
                <label for="rp">Rp</label>
                <input type="text" class="form-control" id="rp" name="rp" value="{{ $pembayaran->rp }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pembayaran->keterangan }}" required>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ $pembayaran->angkatan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('bayaran.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
@endsection

