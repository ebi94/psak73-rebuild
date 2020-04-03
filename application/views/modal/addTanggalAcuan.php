<div class="modal fade" id="addTanggalAcuanModal">
  <div class="modal-dialog modal-md">
    <form enctype="multipart/form-data" name="form" role="form" id="add_tanggal_acuan_modal">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Tanggal Acuan</h4>
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
                      <input class="form-control wajib_isi" id="tanggal_acuan" type="date" name="tanggal_acuan" oninput="this.className = 'form-control wajib_isi'">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input class="form-control wajib_isi" id="keterangan_tanggal_acuan" type="text" name="keterangan_tanggal_acuan" placeholder="*Penggunaan Tahun : XXXX" oninput="this.className = 'form-control wajib_isi'">
                    </div>
                  </div>
                </div>
            </div>
          </section>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" id="addTanggalAcuan" class="btn btn-info col-md-12">Submit</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>