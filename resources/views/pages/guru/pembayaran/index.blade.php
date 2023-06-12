@extends('layouts.main')
@section('title', 'List Siswa')

@section('content')
<section class="section custom-section"><br>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Data Pembayaran SPP</h4>
                       <a href="{{ route('bayaran.create') }}" class="btn btn-success btn-sm">Tambah Pembayaran</a>
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
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Waktu Bayar</th>
                                        <th>Jumlah Uang</th>
                                        <th>Keterangan</th>
                                        <th>Tahun Angkatan</th>
                                        <th style="width:156px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bayar as $data )
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->nama_siswa }}</td>
                                        <td>{{ $data->waktu }}</td>
                                        <td>{{ $data->rp }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->angkatan }}</td>
                                        <td>
                                            <a href="{{ route('bayaran.edit', $data->id) }}" class="btn btn-warning btn-sm fa fa-edit aria-hidden="true"></a>
                                            <a href="{{ route('bayaran.show', $data->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <form action="{{ route('bayaran.destroy', $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 8px"><i class="nav-icon fas fa-trash-alt"></i> &nbsp</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
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
