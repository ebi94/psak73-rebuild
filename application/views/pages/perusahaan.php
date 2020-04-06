<div class="row">
  <div class="col-12 col-sm-12 col-md-12">
    <div class="card">
      <div class="card-header bg-warning">
        PERUSAHAAN
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button> -->
        </div>
      </div>
      <div class="card-body">
        <div style="margin-bottom: 1%;margin-top: 1%;padding: 2%;" class="bg-light">
          <label class="control-label" style="margin-bottom: 1%;">Filter List PT/Perusahaan: </label>
          <form class="form-inline container" style="width: 100%;">
            <div style="margin-right: 1%;">
              <input type="text" name="nama_pt" id="nama_pt" class="form-control" placeholder="Nama PT/Perusahaan">
            </div>
            <div style="margin-right: 1%;">
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
            </div>

            <div style="margin-right: 1%;">
              <button class="btn btn-success search_perusahaan" id="search_perusahaan" type="button"><span class="fa fa-search"> Cari</span></button>
            </div>

            <div style="margin-right: 1%;">
              <button class="btn btn-info add_perusahaan" id="add_perusahaan" type="button" data-toggle="modal" data-target="#addPerusahaanModal" data-backdrop="static" data-keyboard="false" style="margin-bottom: 1%;"><span class="fas fa-plus"> Tambah</span></button>
            </div>
            
          </form>
        </div>
        <table id="perusahaan_list" class="table table-bordered table-striped table-hover perusahaan_list" cellspacing="0" style="width: 100%;">
          <thead class="thead-light">
            <tr >
              <th style="vertical-align: top; text-align: center; width: 5%; font-size: 14px;">No.</th>
              <th style="vertical-align: top; text-align: center; font-size: 14px;">Nama PT/Perushaan</th>
              <th style="vertical-align: top; text-align: center; font-size: 14px;">Alamat</th>
              <th style="vertical-align: top; text-align: center; font-size: 14px;">Telepon</th>
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
  <?php $this->load->view('modal/addPerusahaan'); ?>
  <!--/ .Modal Tambah -->

  <!-- Modal Edit -->
  <?php $this->load->view('modal/editPerusahaan'); ?>
  <!--/ .Modal Edit -->

  <!-- Modal Delete -->
  <?php $this->load->view('modal/deletePerusahaan'); ?>
  <!--/ .Modal Delete -->
</div>