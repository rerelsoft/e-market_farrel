<table class="table" id="data-pelanggan">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Pelanggan</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telpon</th>
      <th scope="col">Email</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($pelanggan as $p)
        <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
          <td>{{ $p->kode_pelanggan }}</td>
          <td>{{ $p->nama }}</td>
          <td>{{ $p->alamat }}</td>
          <td>{{ $p->no_telp }}</td>
          <td>{{ $p->email }}</td>
          <td>
          <button class="btn btn-warning" data-toggle="modal"
          data-target="#modalFormPelanggan" data-mode="edit"
          data-id="{{ $p -> id }}"
          data-kode_pelanggan="{{ $p->kode_pelanggan }}"
          data-nama="{{ $p->nama }}"
          data-alamat="{{ $p->alamat }}"
          data-no_telp="{{ $p->no_telp }}"
          data-email="{{ $p->email }}"

          >
            <i class="fas fa-edit"></i>
          </button>
          <form method="post"
            action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn delete-data btn-danger"
          data-kode_pelanggan="{{ $p->kode_pelanggan }}"
          data-nama="{{ $p->nama }}"
          data-alamat="{{ $p->alamat }}"
          data-no_telp="{{ $p->no_telp }}"
          data-email="{{ $p->email }}">
          <i class="fas fa-trash"></i>
          </button>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
