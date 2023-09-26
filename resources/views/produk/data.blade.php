<table class="table" id="data-produk">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($produk as $p)
        <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
          <td>{{ $p->nama_produk }}</td>
          <td>
          <button class="btn btn-warning" data-toggle="modal"
          data-target="#modalFormProduk" data-mode="edit"
          data-id="{{ $p -> id }}"
          data-nama_produk="{{ $p->nama_produk }}"
          >
            <i class="fas fa-edit"></i>
          </button>
          <form method="post"
            action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn delete-data btn-danger"
          data-nama_produk="{{ $p->nama_produk }}">
          <i class="fas fa-trash"></i>
          </button>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
