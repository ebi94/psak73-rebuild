<div class="row">
	<div class="col-12 col-sm-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div style="margin-bottom: 1%;margin-top: 1%;padding: 2%;" class="bg-light">
					<label class="control-label" style="margin-bottom: 1%;">Filter Schedule: </label>
					<form class="form-inline container" style="width: 100%;">
						<div class="col">
							<div class="form-group col-md-12">
								<label class="pb-md-3">Nama PT/Perusahaan</label>
							</div>
							<div class="col-sm-12">
								<select class="mdb-select form-control" multiple searchable="Ketik disini.." name="nama_pt_schedule[]" id="nama_pt_schedule">
									<option value="" disabled selected>Pilih salah satu</option>
									<?php foreach($perusahaan as $p):?>
									<option value="<?php echo $p->id;?>"><?php echo $p->nama_perusahaan;?></option>
									<?php endforeach;?>
								</select>
							</div>
							<?php if($this->session->userdata('level') == 0):?>
							<div class="form-group col-md-12">
								<label class="pb-md-3 pt-md-3">Nama User</label>
							</div>
							<div class="col-md-12">
								<select class="mdb-select form-control dibuat_oleh_schedule" multiple searchable="Ketik disini.." name="dibuat_oleh_schedule[]" id="dibuat_oleh_schedule">
									<option value="" disabled selected>Pilih salah satu</option>
									<?php foreach($user as $u):?>
									<option value="<?php echo $u->id;?>"><?php echo auth_name($u->id);?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<?php endif; ?>
						</div>
					</form>
					<form class="form-inline container" style="width: 100%;margin-top: 1%;">
						<div style="margin-right: 1%;">
							<button class="btn btn-success search_schedule" type="button" id="search_schedule"><span class="fa fa-search">
									Cari</span></button>
						</div>
					</form>
				</div>
				<table id="schedule_list" class="table table-bordered table-striped table-hover schedule_list" cellspacing="0" style="width: 100%;">
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
							<th style="vertical-align: top; text-align: center; font-size: 14px;"></th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>

		</div>
	</div>
</div>