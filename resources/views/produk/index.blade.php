@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Produk</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-failed">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- tambah --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormProduk">
                    <i class="fa fa-plus"></i>
                    Tambah Produk
                </button>
                {{-- Export --}}
                <a href="{{ route('export_produk') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>
                    Export Produk
                </a>
                {{-- import --}}
                <button href="{{route('import')}}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                    <i class="fa fa-file-excel"></i>
                    Import Produk
                </button>
                {{-- pdf --}}
                <a href="{{route('exportPdf_produk')}}" class="btn btn-danger">
                    <i class="fa fa-file-pdf"></i>
                    Export Produk
                </a>

                <div class="mt-3">
                    @include('produk.data')
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        @include('produk.form')

    </section>
@endsection

@push('script')
    <script>
        $('#alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('#alert-success').slideUp(500)
        })
        $('#alert-failed').fadeTo(5000, 500).slideUp(500, function() {
            $('#alert-failed').slideUp(500)
        })

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red">${data}</span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#modalFormProduk').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_produk = btn.data('nama_produk')
            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Produk')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('.modal-body form').attr('action', '{{ url('produk') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Produk')
                modal.find('#nama_produk').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('produk') }}')
            }
        })
    </script>
@endpush
