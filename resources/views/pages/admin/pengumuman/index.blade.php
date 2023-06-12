@extends('layouts.main')

@section('title', 'List Pengumuman')

@section('content')
<section class="section custom-section">
    <div class="section-body"><br><br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>List Pengumuman</h4>
                     <button class="btn btn-primary" data-toggle="modal" ><a href="{{ route('pengumuman.create') }}" ><font color="fffff"></i><i class="nav-icon fas fa-folder-plus"></i> Tambah Pengumuman</button></i></a></font></div>


                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Judul') }}</th>
                                <th scope="col">{{ __('Deskripsi') }}</th>
                                <th scope="col">{{ __('File') }}</th>
                                <th scope="col">{{ __('Opsi') }}</th>
                                {{-- <th scope="col">{{ __('aksi') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengumuman as $p)
                            <tr>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>
                                    @if($p->file)
                                    <!-- <a href="{{ asset('file/' . $p->file_path) }}"target="_blank">Download</a> -->
                                    <a href="{{ asset('files/' . $p->file) }}" class="btn btn-success btn-sm-1" data-toggle="tooltip" title='Download'style="margin-left: 8px"><i class="nav-icon fas fa-download"></i> &nbsp;Download</a>
                                    <!-- <a href="/file/example.pdf" class="btn btn-primary">Unduh PDF</a> -->
                                    @else
                                    {{ __('Tidak Ada File') }}
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('pengumuman.show', $p->id) }}"data-toggle="tooltip" title='lihat'style="margin-left: 8px" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Lihat</a>
                                    <a href="{{ route('pengumuman.edit', $p->id) }}" data-toggle="tooltip"title='Edit'style="margin-left: 8px" class="btn btn-success btn-sm "><i class="nav-icon fas fa-edit"></i> &nbsp; Edit </a>

                                    <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 8px"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus </button>
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
</section>
@endsection

@push('script')
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Yakin ingin menghapus data ini?`,
                text: "Data akan terhapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>
@endpush
