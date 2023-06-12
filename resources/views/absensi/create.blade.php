@extends('layouts.main')
@section('title')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Absensi</div>
                    <div class="card-body">
                        <form action="{{ route('absensi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggalk">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="mapel" name="mapel" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Alpa">Alpa</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('absensi.index') }}" class="btn btn-danger btn-sm-sm">back</a>
                        </form>
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

