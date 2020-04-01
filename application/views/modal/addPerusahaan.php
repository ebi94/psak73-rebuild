<div class="modal fade" id="addPerusahaanModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="add_perusahaan_modal">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Perusahaan</h4>
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
                    <label>Nama Perusahaan</label>
                    <input class="form-control wajib_isi" id="nama_perusahaan" type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" oninput="this.className = 'form-control wajib_isi'">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" id="alamat" type="password" name="alamat"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Telepon</label>
                    <input class="form-control wajib_isi" id="telepon" type="text" name="telepon" placeholder="" oninput="this.className = 'form-control wajib_isi'">
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" id="addPerusahaan" class="btn btn-info col-md-12">Submit</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>