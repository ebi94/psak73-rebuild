<div class="modal fade" id="editProfileModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="add_perusahaan_modal">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
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
                    <label>Nama</label>
                    <input class="form-control" id="nama_profile" type="text" name="nama_profile" placeholder="Nama">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="profile_password" class="form-control">
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" id="editProfile" class="btn btn-info col-md-12">Save</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>