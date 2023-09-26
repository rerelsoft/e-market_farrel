<table class="table" id="data-produk">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Produk Id</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Satuan</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Stock</th>
      <th scope="col">Ditarik</th>
      <th scope="col">User Id</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($barang as $b)
        <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
          <td>{{ $b->kode_barang }}</td>
          <td>{{ $b->produk_id }}</td>
          <td>{{ $b->nama_barang }}</td>
          <td>{{ $b->satuan }}</td>
          <td>{{ $b->harga_jual }}</td>
          <td>{{ $b->stok }}</td>
          <td>{{ $b->ditarik }}</td>
          <td>{{ $b->user_id }}</td>


          <td>
         <button class="btn btn-warning" data-toggle="modal"
          data-target="#modalFormBarang" data-mode="edit"
          data-id="{{ $b -> id }}"
          data-kode_barang="{{ $b->kode_barang }}"
          data-produk_id="{{ $b->produk_id }}"
          data-nama_barang="{{ $b->nama_barang }}"
          data-satuan="{{ $b->satuan }}"
          data-harga_jual="{{ $b->harga_jual }}"
          data-stok="{{ $b->stok }}"
          data-ditarik="{{ $b->ditarik }}"
          data-user_id="{{ $b->user_id }}"

          >
            <i class="fas fa-edit"></i>
          </button>
          <form method="post"
            action="{{ route('barang.destroy', $b->id) }}" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn delete-data btn-danger"
          data-kode_barang="{{ $b->kode_barang }}"
          data-produk_id="{{ $b->produk_id }}"
          data-nama_barang="{{ $b->nama_barang }}"
          data-satuan="{{ $b->satuan }}"
          data-harga_jual="{{ $b->harga_jual }}"
          data-stok="{{ $b->stok }}"
          data-ditarik="{{ $b->ditarik }}"
          data-user_id="{{ $b->user_id }}">
          <i class="fas fa-trash"></i>
          </button>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
