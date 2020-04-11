<div class="modal fade" id="addUserModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="add_user_modal">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama User</label>
                    <input class="form-control wajib_isi" id="nama_user" type="text" name="nama_user" placeholder="Nama User" oninput="this.className = 'form-control wajib_isi'">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control wajib_isi" id="email_user" type="text" name="email_user" placeholder="Email User" oninput="this.className = 'form-control wajib_isi'">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control wajib_isi" id="password_user" type="password" name="password_user" placeholder="Password" oninput="this.className = 'form-control wajib_isi'">
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" id="addUser" class="btn btn-info col-md-12">Submit</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>