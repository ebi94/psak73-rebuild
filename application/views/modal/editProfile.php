<div class="modal fade" id="editProfileModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="edit_profile_modal">
      <input class="form-control" id="edit_id_profile" type="hidden" name="edit_id_profile" value="<?php echo $this->session->userdata('ses_id');?>">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
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
                      <input class="form-control" id="edit_nama_profile" type="text" name="edit_nama_profile" value="<?php echo $this->session->userdata('ses_nama');?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" id="edit_email_profile" type="text" name="edit_email_profile" value="<?php echo $this->session->userdata('ses_email');?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" id="edit_password_profile" type="password" name="edit_password_profile">
                      <input class="form-control" id="edit_password_profile_old" type="hidden" name="edit_password_profile_old" value="<?php echo $this->session->userdata('ses_password');?>">
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