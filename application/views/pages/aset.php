<div class="row">
  <div class="col-12 col-sm-12 col-md-12">
    <div class="card" style="padding: 2%;">
      <div class="card-header">
        <button class="btn btn-info float-right add_aset" id="add_aset" type="button" data-toggle="modal" data-target="#addAsetModal" data-backdrop="static" data-keyboard="false" style="margin-bottom: 1%;"><span class="fas fa-plus"> Tambah</span></button>
      </div>
      <div style="margin-bottom: 1%;margin-top: 1%;padding: 2%;" class="bg-light">
        <label class="control-label" style="margin-bottom: 1%;">Filter List Aset: <!-- <?php echo $this->session->userdata('ses_id'); ?> --></label>
        <form class="form-inline container" style="width: 100%;">
          <div style="margin-right: 1%;">
            <input type="text" name="pt" id="pt" class="form-control" placeholder="Nama PT">
          </div>
          <div style="margin-right: 1%;">
            <input type="text" name="kontrak" id="kontrak" class="form-control" placeholder="No. Kontrak">
          </div>
          <div style="margin-right: 1%;">
            <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Vendor">
          </div>

          <?php if($this->session->userdata('level') == 0):?>
          <div style="margin-right: 1%;">
            <select class="form-control selectpicker dibuat_oleh" data-live-search="true" name="dibuat_oleh" id="dibuat_oleh">
                <option value="ALL">-- Semua User --</option>
            </select>
          </div>
          <?php endif; ?>

          <div style="margin-right: 1%;">
            <button class="btn btn-secondary search_aset" id="search_aset" type="button"><span class="fa fa-search"> Cari</span></button>
          </div>
        </form>
      </div>
      <table id="aset_list" class="table table-bordered table-striped table-hover aset_list" cellspacing="0" style="width: 100%;">
        <thead class="thead-light">
          <tr >
            <th style="vertical-align: top; text-align: center; width: 5%; font-size: 14px;">No.</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Nama PT</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">No. Kontrak</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Vendor</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Jenis Sewa</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Lokasi Sewa</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Start Date</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">End Date</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Nilai Kontrak</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Dibuat Oleh</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;"></th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah -->
  <?php $this->load->view('modal/addAset'); ?>
  <!--/ .Modal Tambah -->

  <!-- Modal Tambah Plus Confirm -->
  <?php $this->load->view('modal/addPlusAset'); ?>
  <!--/ .Modal Tambah Plus Confirm -->

</div>