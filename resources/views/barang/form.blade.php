<div class="modal fade" id="modalFormBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form method="post" action="barang">
                @csrf
                <div id="method" >
                </div>
        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Kode Barang</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Produk Id</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="produk_id" name="produk_id" placeholder="Produk Id">
            </div>
        </div>

        <div class="form-group row">
            <label for="text" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="satuan" name="satuan" placeholder="Satuan">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Stock</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="stok" name="stok" placeholder="Stock">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">Ditarik</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="ditarik" name="ditarik" placeholder="Ditarik">
            </div>
        </div>

        <div class="form-group row">
            <label for="number" class="col-sm-4 col-form-label">User Id</label>
            <div class="col-sm-8">
            <input type="number"  class="form-control" id="user_id" name="user_id" placeholder="User Id">
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
    </div>
  </div>
</div>
