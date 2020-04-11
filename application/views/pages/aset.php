<div class="row">
	<div class="col-12 col-sm-12 col-md-12">
		<div class="card" style="padding: 2%;">
			<div class="card-header">
				<button class="btn btn-info float-right add_aset" id="add_aset" type="button" data-toggle="modal"
					data-target="#addAsetModal" data-backdrop="static" data-keyboard="false" style="margin-bottom: 1%;"><span
						class="fas fa-plus"> Tambah</span></button>
			</div>
			<div style="margin-bottom: 1%;margin-top: 1%;padding: 2%; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.3), 0 2px 10px 0 rgba(0, 0, 0, 0);" class="bg-light">
				<label class="control-label" style="margin-bottom: 1%;">Filter List Aset:
					<!-- <?php //echo $this->session->userdata('ses_id'); ?> --></label>
				<form class="form-inline container" style="width: 100%;">
					<div class="row col-sm-12">
						<div class="col-sm-6">
							<label class="pb-md-1"  style=" justify-content: flex-start;">Nama PT/Perusahaan</label>
							<select class="mdb-select form-control" multiple searchable="Ketik disini.." name="pt[]" id="pt">
								<option value="" disabled selected>Silahkan pilih</option>
								<?php foreach($perusahaan as $p):?>
								<option value="<?php echo $p->nama_perusahaan;?>"><?php echo $p->nama_perusahaan;?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="col-sm-6">
							<label class="pb-md-1" style=" justify-content: flex-start;">Nomor Kontrak</label>
								<input type="text" name="kontrak" id="kontrak" class="form-control" placeholder="No. Kontrak" style="width: inherit;">
						</div>
					</div>
					<div class="row col-sm-12">
						<div class="col-sm-6">
							<label class="pb-md-1 pt-md-3" style=" justify-content: flex-start;">Vendor</label>
							<input type="text" name="vendor" id="searchVendor" class="form-control" placeholder="Vendor" style="width: inherit;">
						</div>
						<div class="col-sm-6">
							<?php if($this->session->userdata('level') == 0):?>
							<label class="form-group pb-md-1 pt-md-3" style=" justify-content: flex-start;">User</label>
							<select class="mdb-select form-control" multiple searchable="Ketik disini.." name="dibuat_oleh[]"
								id="dibuat_oleh">
								<option value="" disabled selected>Pilih salah satu</option>
								<?php foreach($user as $u):?>
								<option value="<?php echo $u->id;?>"><?php echo auth_name($u->id);?></option>
								<?php endforeach;?>
							</select>
							<?php endif; ?>
						</div>
					</div>
					<div class="row col-sm-12 div-search">
						<button class="btn btn-success search_aset" id="search_aset" type="button">
							<span class="fa fa-search">Cari</span>
						</button>
					</div>
				</form>
			</div>
			<table id="aset_list" class="table table-bordered table-striped table-hover aset_list" cellspacing="0"
				style="width: 100%;">
				<thead class="thead-light">
					<tr>
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
						<th style="vertical-align: top; text-align: center; font-size: 14px;">Action</th>
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

	<!-- Modal Ubah -->
	<?php $this->load->view('modal/editAset'); ?>
	<!--/ .Modal Ubah -->

	<!-- Modal Ubah -->
	<?php $this->load->view('modal/viewAset'); ?>
	<!--/ .Modal Ubah -->

	<!-- Modal Tambah Plus Confirm -->
	<?php $this->load->view('modal/addPlusAset'); ?>
	<!--/ .Modal Tambah Plus Confirm -->

	<!-- Modal Confirm Close Add -->
	<?php $this->load->view('modal/confirmClose'); ?>
	<!--/ .Modal Confirm Close Add -->

	<!-- Modal Delete Aset -->
	<?php $this->load->view('modal/deleteAset'); ?>
	<!--/ .Modal Delete Aset -->

	<!-- Modal Delete Aset -->
	<?php $this->load->view('modal/loading'); ?>
	<!--/ .Modal Delete Aset -->

</div>
