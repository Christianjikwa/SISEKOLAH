@extends('layouts.main')
@section('title', 'List Siswa')

@section('content')
<section class="section custom-section"><br><br>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Detai pembayaran SPP Siswa</h4>
                        <a href="{{ route('bayaran.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ $message }}
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                      <div class="card-header d-flex justify-content-between">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{ $bayar->nama_siswa }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rp" class="col-sm-3 col-form-label">Jumlah Uang</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="rp" class="form-control" id="rp" value="{{ $bayar->rp }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="4" readonly>{{ $bayar->keterangan }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="angkatan" class="col-sm-3 col-form-label">Tahun Angkatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="angkatan" class="form-control" id="angkatan" value="{{ $bayar->angkatan }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('script')
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Yakin ingin menghapus data ini?`
                , text: "Data akan terhapus secara permanen!"
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
@endpush
