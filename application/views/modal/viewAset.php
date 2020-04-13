<div class="modal fade" id="viewAsetModal">
	<div class="modal-dialog modal-lg" style="max-width: 1300px;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Lihat Data</h4>
				<button type="button" class="close" id="close-modal-lihat" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- @include('showdetail') -->
				<?php $this->load->view('modal/showDetail'); ?>
			</div>
			<div class="modal-footer justify-content-between">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
					<input type="hidden" id="vIdSum">
					<input type="hidden" id="vIdCal">
					<input type="hidden" id="vIdKon">
					<input type="hidden" id="vNamapt">
					<input type="hidden" id="vNomorKontrak">
					<input type="hidden" id="vVendor">
					<button type="button" class="btn btn-primary float-right" id="btnPlusAset">Tambah Aset</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
