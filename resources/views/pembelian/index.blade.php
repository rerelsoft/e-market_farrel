@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pembelian</h3>

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


                <div class="card-body">
                    <form class="" id="formTransaksi" method="post" action="pembelian">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <label for="kode-pembelian" class="col-4 col-form-label col-form-label-sm">Kode
                                    Pembelian</label>
                                <input type="text" class="form-control form-control-sm" id="kode-pembelian"
                                    placeholder="" readonly value="{{ $kode }}" name="kode_masuk">

                            </div>

                            <div class="col-5 ml-5">
                                <label for="tanggal-pembelian" class="col-4 col-form-label col-form-label-sm">Tanggal
                                    Pembelian</label>
                                <input type="date" class="form-control form-control-sm" placeholder=""
                                    name="tanggal_masuk" value="{{date('Y-m-d')}}">
                            </div>

                            <div class="row">
                                <div class="col-5 mt-4 form-group">
                                    <label class="control-label col-5 mt-4">&nbsp;</label>
                                </div>
                            </div>

                            <div class="col-5 mt-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#tblBarangModal" id="tambahBarangBtn">
                                    Tambah Barang
                                </button>
                            </div>

                            <div class="col-6 ml-5">
                                <label for="distributor" class="col-6 col-form-label col-form-label-sm">Distributor</label>
                                <select class="custom-select col-6" required="required" name="pemasok_id">
                                    <option selected>Pilih Distributor</option>
                                    @foreach ($pemasok as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_pemasok }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>





                        <div class="row">
                            <div class="col-md 12">
                                <h3 class="p-1 mb-2 mt-2">Barang</h3>
                                <table id="tblTransaksi" class="table table-stripped table-bordered bulk_action">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            {{-- <td colspan="6"
                                                style="text-align:center;font-style:italic;background:#3333;">Belum ada data
                                            </td> --}}

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- bagian total, submit, data hidden --}}
                        <div class="row justify-content-end" style="text-align: right;">
                            <label class="control-label col-md-2 col-sm-2 offset-md-7">Total Harga</label>
                            <div class="control-label col-md-3 mr-md-auto"
                                style="padding-right: 10px; align-content: right;">
                                <input class="form-control col-md-8 col-xs-12" style="margin-left: 80px" required="required"
                                    type="text" id="totalHarga" name="total">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12"
                                style="margin-top: 20px; padding-right: 0; align-content: right; margin-right: 0; text-align: right">
                                <div class="col-md-12 col-sm-9 col-xs-12">
                                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('pembelian.modal')

    </section>
@endsection

@push('script')
    <script>
        $(function() {
            $('#tblBarang2').DataTable()
            // pemilihan barang
            $('#tblBarangModal').on('click', '.pilihBarangBtn', function() {
                tambahBarang(this);
            });
            // change qty event
            $('#tblTransaksi').on('change', '.qty', function() {
                calcSubTotal(this);
            })

            // remove barang
            $('#tblTransaksi').on('click', '.btnRemoveBarang', function() {
                let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
                totalHarga -= subTotalAwal;

                $currentRow = $(this).closest('tr').remove();
                $('#totalHarga').val(totalHarga);

                let tbody = Number($('#tblTransaksi tbody').text());
                if (tbody == 0)
                    $('#tblTransaksi tbody').append(
                        '<tr><td colspan="6" style="text-align:center;font-style:italic;background:#3333;">Belum ada data</td></tr>'
                    );
            })
        });





        let totalHarga = 0;

        function tambahBarang(a) {
            let d = $(a).closest('tr');
            let kodeBarang = d.find('td:eq(1)').text();
            let namaBarang = d.find('td:eq(2)').text();
            let hargaBarang = d.find('td:eq(3)').text();
            let idBarang = d.find('.idBarang').val();
            let data = '';
            let tbody = $('#tblTransaksi tbody tr td').text();
            data += '<tr>';
            data += '<td>' + kodeBarang + '</td>';
            data += '<td>' + namaBarang + '</td>';
            data += '<td>' + hargaBarang + '</td>';
            data += '<input type="hidden" name="barang_id[]" value="' + idBarang + '">'
            data += '<input type="hidden" name="harga_beli[]" value="' + hargaBarang + '">'
            data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]"></td>';
            data += '<td><input type="text" readonly name="sub_total[]" class="subTotal" value="' + hargaBarang + '"></td>';
            data +=
                '<td><button type="button" class="btnRemoveBarang btn-danger"><span class="fas fa-times"></span></button></td>';
            data += '</tr>';
            if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

            $('#tblTransaksi tbody').append(data);
            totalHarga += parseFloat(hargaBarang);
            $('#totalHarga').val(totalHarga);
            $('#tblBarangModal').modal('hide');
        }

        function calcSubTotal(a) {
            let qty = parseInt($(a).closest('tr').find('.qty').val());
            let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
            let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
            let subTotal = qty * hargaBarang;
            totalHarga += subTotal - subTotalAwal;
            $(a).closest('tr').find('.subTotal').val(subTotal);
            $('#totalHarga').val(totalHarga);
        }
    </script>
@endpush
