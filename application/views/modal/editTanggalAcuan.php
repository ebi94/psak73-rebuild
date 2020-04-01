<div class="modal fade" id="editTanggalAcuanModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="edit_tanggal_acuan_modal">
      <input class="form-control" id="edit_id_tanggal_acuan" type="hidden" name="edit_id_tanggal_acuan">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Edit Tanggal Acuan</h4>
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
                      <label>Tanggal</label>
                      <input class="form-control" id="edit_tanggal_acuan" type="date" name="edit_tanggal_acuan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input class="form-control" id="edit_keterangan_tanggal_acuan" type="text" name="edit_keterangan_tanggal_acuan">
                    </div>
                  </div>
                </div>
            </div>
          </section>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" id="editTanggalAcuan" class="btn btn-info col-md-12">Save</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>