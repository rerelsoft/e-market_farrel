<div class="modal fade" id="modalFormUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form method="post" action="user">
                @csrf
                <div id="method">

                </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama User</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="name" name="name" placeholder="Nama User">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="email"  class="form-control" id="email" name="email" placeholder="email@gmail.com">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
            <input type="password"  class="form-control" id="password" name="password" placeholder="password">
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
