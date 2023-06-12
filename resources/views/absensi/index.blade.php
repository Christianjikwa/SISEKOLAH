@extends('layouts.main')
@section('title')

@section('content')
@section('content')
<section class="section custom-section"><br>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>List Absensi</h4>
                       <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i>&nbsp;Tambah Absensi</a>
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
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Mata Pelajaran</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absensi as $data)
                                    <tr>
                                        <td>{{ $data->nama_siswa }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->mapel }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            {{-- <a href="{{ route('absensi.show', $data->id) }}" class="btn btn-info">Lihat</a> --}}
                                            <a href="{{ route('absensi.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                            {{-- <form action="{{ route('absensi.destroy', $data->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
