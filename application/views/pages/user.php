<div class="row">
	<div class="col-12 col-sm-12 col-md-12">
		<div class="card" style="padding: 2%;">
			<div class="card-header">
				<button class="btn btn-info float-right add_user" id="add_user" type="button" data-toggle="modal"
					data-target="#addUserModal" data-backdrop="static" data-keyboard="false" style="margin-bottom: 1%;"><span
						class="fas fa-plus"> Tambah</span></button>
			</div>
			<table id="user_list" class="table table-bordered table-striped table-hover aset_list" cellspacing="0"
				style="width: 100%;">
				<thead class="thead-light">
					<tr>
						<th style="vertical-align: top; text-align: center; width: 5%; font-size: 14px;">No.</th>
						<th style="vertical-align: top; text-align: center; font-size: 14px;">Nama</th>
						<th style="vertical-align: top; text-align: center; font-size: 14px;">Email</th>
						<th style="vertical-align: top; text-align: center; font-size: 14px;">Status</th>
						<th style="vertical-align: top; text-align: center; font-size: 14px;">Action</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal Tambah -->
	<?php $this->load->view('modal/addUser'); ?>
	<!--/ .Modal Tambah -->

	<!-- Modal Ubah -->
	<?php $this->load->view('modal/editUser'); ?>
	<!--/ .Modal Ubah -->


	<!-- Modal Delete Aset -->
	<?php $this->load->view('modal/deleteUser'); ?>
	<!--/ .Modal Delete Aset -->

</div>
