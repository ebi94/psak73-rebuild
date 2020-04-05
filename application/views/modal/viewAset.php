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
				<?php $this->load->view('modal/ShowDetail'); ?>
			</div>
			<div class="modal-footer justify-content-between">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
				<a href="" id="addmoreasset">
					<input type="hidden" id="vIdSum">
					<input type="hidden" id="vIdCal">
					<input type="hidden" id="vIdKon">
					<input type="hidden" id="vNamapt">
					<input type="hidden" id="vNomorKontrak">
					<input type="hidden" id="vVendor">
					<button type="button" class="btn btn-primary float-right" data-backdrop="static"
						data-keyboard="false" id="btnPlusAset">Tambah Aset</button>
				</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
