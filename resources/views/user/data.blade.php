<table class="table" id="data-user">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama User</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $s)
        <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
          <td>{{ $s->name }}</td>
          <td>{{ $s->email }}</td>
          <td>{{ $s->password }}</td>
          <td>
          <button class="btn btn-warning" data-toggle="modal"
          data-target="#modalFormUser" data-mode="edit"
          data-id="{{ $s -> id }}"
          data-name="{{ $s->name }}"
          data-email="{{ $s->email }}"
          data-password="{{ $s->password }}"
          >
            <i class="fas fa-edit"></i>
          </button>
          <form method="post"
            action="{{ route('user.destroy', $s->id) }}" style="display: inline">
          @csrf
          @method('DELETE')
          <button type="button" class="btn delete-data btn-danger"
          data-name="{{ $s->name }}"
          data-email="{{ $s->email }}"
          data-password="{{ $s->password }}">
          <i class="fas fa-trash"></i>
          </button>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
