<table class="table" id="data-pemasok">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pemasok</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($pemasok as $p)
        <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
          <td>{{ $p->nama_pemasok }}</td>
          <td>
          <button class="btn btn-warning" data-toggle="modal"
          data-target="#modalFormPemasok" data-mode="edit"
          data-id="{{ $p -> id }}"
          data-nama_pemasok="{{ $p->nama_pemasok }}"
          >
            <i class="fas fa-edit"></i>
          </button>
          <form method="post"
            action="{{ route('pemasok.destroy', $p->id) }}" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn delete-data btn-danger"
          data-nama_pemasok="{{ $p->nama_pemasok }}">
          <i class="fas fa-trash"></i>
          </button>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
