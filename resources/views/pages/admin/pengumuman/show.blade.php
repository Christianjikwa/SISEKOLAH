@extends('layouts.main')

@section('title', 'List Pengumuman')

@section('content')
<section class="section custom-section"><br><br>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="container">

                    <div class="card-header">{{ $pengumuman->judul }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="deskripsi">{{ __('Deskripsi') }}</label>
                            <p>{{ $pengumuman->deskripsi }}</p>
                        </div>

                        @if ($pengumuman->file)
                            <div class="form-group">
                                <label for="file">{{ __('File') }}</label>
                                <div>
                                    <a href="{{ asset('files/' . $pengumuman->file) }}" target="_blank">{{ $pengumuman->file }}</a>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-primary">{{ __('Kembali') }}</a>
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
