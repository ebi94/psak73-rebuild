<!-- Info boxes -->
<div class="row">

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-boxes"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Jumlah Aset</span>
				<span class="info-box-number"><?php echo ribuan($jumlah_asset->jumlah_asset); ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-contract"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Jumlah Kontrak</span>
				<span class="info-box-number"><?php echo ribuan($jumlah_kontrak->jumlah_kontrak); ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-4">
		<div class="info-box mb-6">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Jumlah Nilai Kontrak</span>
				<span class="info-box-number"><?php echo rupiah($jumlah_nilai_kontrak->jumlah_nilai_kontrak);?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-12 col-sm-6 col-md-2">
		<div class="info-box mb-2">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Jumlah User</span>
				<span class="info-box-number"><?php echo $jumlah_user->jumlah_user;?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<div class="row">
	<div class="col-12 col-sm-6 col-md-12">
		<div class="mt-2">
			<!-- <p class="h1-responsive">Selamat Datang, <?php echo $this->session->userdata('ses_nama');?></p> -->
		</div>
	</div>
</div>
