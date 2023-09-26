<div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-stripped table-compact" id="tblBarang2">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                      <tr>
                        <td>{{ $i = !isset($i)?$i=1:++$i }}
                          <input type="hidden" class="idBarang" name="idBarang" value="{{ $b -> id}}">
                        </td>
                        <td>{{ $b->kode_barang }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->harga_jual }}</td>
                        <td>
                            <div class="col">
                                <button type="button" class="btn pilihBarangBtn btn-info">Pilih</button>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>



        </div>
      </div>
    </div>
  </div>
