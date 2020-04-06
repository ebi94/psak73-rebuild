<div class="col-6 col-sm-6 col-md-6">
  <div class="card">
    <div class="card-header bg-warning">
      TANGGAL ACUAN
      <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button> -->
      </div>
    </div>
    <div class="card-body">
      <div style="margin-bottom: 1%;margin-top: 1%;padding: 2%;" class="bg-light">
        <div style="margin-right: 1%;">
          <button class="btn btn-info add_tanggal_acuan" id="add_tanggal_acuan" type="button" data-toggle="modal" data-target="#addTanggalAcuanModal" data-backdrop="static" data-keyboard="false" style="margin-bottom: 1%;"><span class="fas fa-plus"> Tambah</span></button>
        </div>
      </div>
      <table id="tanggal_acuan_list" class="table table-bordered table-striped table-hover tanggal_acuan_list" cellspacing="0" style="width: 100%;">
        <thead class="thead-light">
          <tr >
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Tanggal (Keterangan)</th>
            <th style="vertical-align: top; text-align: center; font-size: 14px;">Action</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
  <?php $this->load->view('modal/addTanggalAcuan'); ?>
<!--/ .Modal Tambah -->

<!-- Modal Edit -->
  <?php $this->load->view('modal/editTanggalAcuan'); ?>
<!--/ .Modal Tambah -->

<!-- Modal Delete -->
<?php $this->load->view('modal/deleteTanggalAcuan'); ?>
<!--/ .Modal Delete -->