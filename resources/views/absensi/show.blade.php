<!-- show.blade.php -->
{{-- @extends('layouts.app')

@section('content')
    <h1>Detail Absensi</h1>

    <div>
        <p><strong>Nama Siswa:</strong> {{ $absensi->nama_siswa }}</p>
        <p><strong>Tanggal:</strong> {{ $absensi->tanggal }}</p>
        <p><strong>Mata Pelajaran:</strong> {{ $absensi->mapel }}</p>
        <p><strong>Status:</strong> {{ $absensi->status }}</p>
    </div>
    <a href="absensi.index" class="btn btn-primary">Kembali</a>
</section>
@endsection --}}

@extends('layouts.main')
@section('title')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Detail Absensi</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>{{ $absensi->nama_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $absensi->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <td>{{ $absensi->mapel }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $absensi->status }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-primary">Edit</a> --}}
                        <a href="{{ route('absensi.index') }}" class="btn btn-danger btn-sm-sm">back</a>
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
