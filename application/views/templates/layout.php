<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PSAK73 | <?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/sweetalert2/sweetalert2.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/sweetalert2-theme-bootstrap4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/toastr/toastr.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style type="text/css">
    	/* Mark input boxes that gets an error on validation: */
    	input.invalid {
    	  background-color: #ffdddd;
    	}

    	/* Hide all steps by default: */
    	.tab_step {
    	  display: none;
    	}

    	/* Make circles that indicate the steps of the form: */
    	.step {
    	  height: 36px;
    	  width: 36px;
    	  padding: 4px;
    	  color: #666;
	      text-align: center;
	      font: 20px Arial, sans-serif;
	      border: 2px solid #666;
    	  /*margin: 0 2px;*/
    	  background-color: #bbbbbb;
    	  border-radius: 50%;
    	  display: inline-block;
    	  opacity: 0.5;
    	}

    	/* Mark the active step: */
    	.step.active {
    	  opacity: 1;
    	}

    	/* Mark the steps that are finished and valid: */
    	.step.finish {
    	  background-color: #4CAF50;
    	}
    </style>
</head>
<body class="hold-transition sidebar-mini sidebar-open layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-light navbar-orange border-bottom-0">
			<!-- Left Navbar Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right Navbar Links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown show">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
						<i class="fas fa-user-cog fa-md" style="color: black;"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">Hello <?php echo $this->session->userdata('ses_nama');?></span>
						<div class="dropdown-divider"></div>
						<?php if($this->session->userdata('level') == 0) { ?>
						  <a href="<?php echo base_url('admin/users') ?>" class="dropdown-item">
						    <i class="fas fa-users mr-2"></i> Users
						  </a>
						<?php } ?>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item" id="add_user" type="button" data-toggle="modal" data-target="#editProfileModal">
						  <i class="fas fa-user-edit mr-2"></i> Edit Profil
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?php echo base_url('log/out'); ?>" class="dropdown-item" id="log_out" type="button">
						  <i class="fas fa-power-off mr-2"></i> Log Out
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!--/ .Navbar  -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('templates/sidebar'); ?>
		<!--/ .Main Sidebar Container -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Contetn Header (Page Header)-->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark"><?php echo $title; ?></h1>
						</div>
						<!--/ .col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url(''); ?>">Dashboard</a>
								</li>
								<?php if($title != 'Dashboard'): ?>
									<li class="breadcrumb-item active"><?php echo $title; ?></li>
								<?php endif; ?>
							</ol>
						</div>
						<!--/ .col -->
					</div>
					<!--/ .row -->
				</div>
				<!--/ .container-fluid -->
			</div>
			<!--/ .Contetn Header -->

			<!-- Main Content -->
			<section class="content">
				<div class="container-fluid">
					<?php $this->load->view($view); ?>
				</div>
				<!--/ .container-fluid-->
			</section>
			<!--/ .Main Content -->
		</div>
		<!--/ .Content Wrapper. Contains page content -->
	</div>


	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Bootstrap 4-->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/select2/js/select2.full.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- Toastr -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/toastr/toastr.min.js"></script>
	<!-- Toastr -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/toastr/toastr.min.js"></script>
	<!-- Input Mask -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/dist/js/adminlte.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/chart.js/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- DateRangePicker -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Popper.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$('.select2').select2();
		function validateFormWajib() {
		  // This function deals with validation of the form fields
		  var y, i, valid = true;
		  y = document.getElementsByClassName("wajib_isi");
		  // A loop that checks every input field in the current tab:
		  for (i = 0; i < y.length; i++) {
		    // If a field is empty...
		    if (y[i].value == "") {
		      // add an "invalid" class to the field:
		      y[i].className += " invalid";
		      // and set the current valid status to false:
		      valid = false;
		    }
		  }
		  return valid; // return the valid status
		}

		const Toast = Swal.mixin({
		    toast: true,
		    position: 'top-end',
		    showConfirmButton: false,
		    timer: 3000
	    });

	    function toastFire(status, message) {
	    	Toast.fire({
	    	    type: status,
	    	    title: message
	      });
	    }

	    function alerttoast(message){
	    	toastr.error(message);
	    }
		// $('#aset_list').hide();

		// USER MANAGEMENT
			
		// End
	
		<?php if ($title == 'List Aset'):?>
			// Halaman List Aset
				var pts = '';
				var kontraks = '';
				var vendors = '';
				var dibuat_olehs = '';
				fill_datatable_aset(pts,kontraks,vendors,dibuat_olehs);
				function fill_datatable_aset(pt = '', kontrak = '', vendor = '', dibuat_oleh = ''){
					$('#aset_list').DataTable({
						"paging"		: true,
						"lengthChange"	: false,
						"searching"		: false,
						"ordering"		: false,
						"info"			: true,
						"autoWidth"		: false,
						"scrollX"		: true,
						"scrollY"		: true,
						"ajax"			: {
							url		: "<?php echo base_url('aset/list') ?>",
							type	: "GET",
							data	: {
								pt:pt,
								kontrak:kontrak,
								vendor:vendor,
								dibuat_oleh:dibuat_oleh
							}
						},
					});
				}

				$('#search_aset').on('click',function(){
					var pt = $('#pt').val();
					var kontrak = $('#kontrak').val();
					var vendor = $('#vendor').val();
					var dibuat_oleh = $('#dibuat_oleh').val();

					// alert(dibuat_oleh);

					$('#aset_list').DataTable().destroy();
					// $('#aset_list').show();
					fill_datatable_aset(pt,kontrak,vendor,dibuat_oleh);
				});

				// ADD ASET
					document.getElementById("submit_form").style.display = "none";
					var currentTab = 0; // Current tab is set to be the first tab (0)
					showTab(currentTab); // Display the current tab
					// $('#add_aset').on('click',function(){
					// 	showTab(currentTab);
					// 	$('#addAsetModal').modal("show");
					// 	$('#addAsetModal').modal({backdrop: 'static', keyboard: false});
					// });

					// $('#addAsetModal').on('hidden.bs.modal', function (e) {
					//   $(this)
					//     .find("input,textarea,select")
					//        .val('')
					//        .end()
					//     .find("input[type=checkbox], input[type=radio]")
					//        .prop("checked", "")
					//        .end();
					// });

					function showTab(n) {
					  // This function will display the specified tab of the form ...
					  var x = document.getElementsByClassName("tab_step");
					  x[n].style.display = "block";
					  // ... and fix the Previous/Next buttons:
					  if (n == 0) {
					    document.getElementById("prevBtn").style.display = "none";
					  } else {
					    document.getElementById("prevBtn").style.display = "inline";
					  }
					  if (n == (x.length - 1)) {
					  	// alert('akhir');
					  	document.getElementById("nextBtn").style.display = "none";
					  	document.getElementById("submit_form").style.display = "inline";
					  } else {
					    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
					  }

					  document.getElementById("jumlah").innerHTML = x.length;
					  // ... and run a function that displays the correct step indicator:
					  // fixStepIndicator(n)
					}

					function nextPrev(n) {
					  // This function will figure out which tab to display
					  var x = document.getElementsByClassName("tab_step");
					  var val = document.getElementById("step").innerHTML;
					  // Exit the function if any field in the current tab is invalid:
					  if (n == 1 && !validateForm()) return false;
					  // Hide the current tab:
					  x[currentTab].style.display = "none";
					  // Increase or decrease the current tab by 1:
					  currentTab = currentTab + n;
					  document.getElementById("step").innerHTML = parseInt(val) + n;
					  if (n == -1) {
					  	document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
					  }
				  	  // Otherwise, display the correct tab:
				  	  // alert(currentTab);
				  	  showTab(currentTab);
					}

					function validateForm() {
					  // This function deals with validation of the form fields
					  var x, y, i, valid = true;
					  x = document.getElementsByClassName("tab_step");
					  // y = x[currentTab].getElementsByTagName("input");
					  y = x[currentTab].getElementsByClassName("wajib");
					  // A loop that checks every input field in the current tab:
					  for (i = 0; i < y.length; i++) {
					    // If a field is empty...
					    if (y[i].value == "") {
					      // add an "invalid" class to the field:
					      y[i].className += " invalid";
					      // and set the current valid status to false:
					      valid = false;
					    }
					  }
					  // If the valid status is true, mark the step as finished and valid:
					  // if (valid) {
					    // document.getElementsByClassName("step")[currentTab].className += " finish";
					  // }
					  return valid; // return the valid status
					}

					$('#add_modal_aset').on('keyup keypress', function(e) {
					  var keyCode = e.keyCode || e.which;
					  if (keyCode === 13) { 
					    e.preventDefault();
					    return false;
					  }
					});

					$('#add_modal_aset').submit(function(e){
					  var formData = new FormData(this);
					  e.preventDefault();
					  $.ajax({
					      type : "POST",
					      url  : "<?php echo site_url('aset/do/add')?>",
					      data : formData,
					      processData:false,
					      contentType:false,
					      cache:false,
					      async:false,
					      success: function(data){
						      	document.getElementById("add_modal_aset").reset();
						      	$('#addAsetModal').modal("hide");
						      	$('.inputan').html(data);
						      	$('#addPlusAsetModal').modal({backdrop: 'static', keyboard: false});
						      	// document.getElementById("no_kontrak_plus").innerHTML = data;
						      	$('#addPlusAsetModal').modal('show');
					      },
					  });
					  return false;
					});

					$('#addPlusAset').on('click', function(){
						// var idKontrak = document.getElementById("id_kontraks").val();
						var idKontrak = $("#id_kontraks").val();
						alert(idKontrak);
						$('#addPlusAsetModal').modal('hide');
						$("#title_add_aset").val("Add Plus New Aset");
						$("#id_kontrak").val(idKontrak);
						nextPrev(-8);
						// document.getElementById("close-modal").id = 'close-modal-tambah';
						document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
						$('#addAsetModal').modal("show");
					});

					// $('#close-modal-tambah').on('click',function(){
					// 	document.getElementById("add_modal_aset").reset();
					// 	$("#title_add_aset").val("");
					// 	$("#id_kontrak").val('');
					// 	nextPrev(-8);
					// 	$('#addAsetModal').modal("hide");
					// });
				// END

			// End
		<?php endif; ?>
		
		<?php if ($title == 'Config'): ?>
			// Halaman Config

				// Config Perusahaan
					fill_datatable_perusahaan();
					function fill_datatable_perusahaan(pt = '', alamat = ''){
						$('#perusahaan_list').DataTable({
							"paging"		: true,
							"lengthChange"	: false,
							"searching"		: false,
							"ordering"		: false,
							"info"			: true,
							"autoWidth"		: false,
							"scrollX"		: true,
							"scrollY"		: true,
							"ajax"			: {
								url		: "<?php echo base_url('perusahaan/list') ?>",
								type	: "GET",
								data	: {
									pt:pt,
									alamat:alamat
								}
							},
						});
					}

					$('#search_perusahaan').on('click',function(){
						var pt = $('#nama_pt').val();
						var alamat = $('#alamat').val();

						$('#perusahaan_list').DataTable().destroy();
						$('#perusahaan_list').show();
						fill_datatable_perusahaan(pt,alamat);
					});

					// ADD PERUSAHAAN
						$('#add_perusahaan_modal').submit(function(e){
						  if(!validateFormWajib()) return false;
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('perusahaan/do/add')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("add_perusahaan_modal").reset();
							      	$('#addPerusahaanModal').modal("hide");
							      	toastFire('success','Berhasil Tambah Perusahaan');
							      	$('#search_perusahaan').click();
						      },
						  });
						  return false;
						});
					// END
					
					// EDIT PERUSAHAAN
						// $('.edit_perusahaan').on('click',function() {
						$(document).on("click", ".edit_perusahaan", function () {
							var idPerusahaan = $(this).data('idp');
							var namaPerusahaan = $(this).data('namap');
							var alamatPerusahaan = $(this).data('alamatp');
							var teleponPerusahaan = $(this).data('teleponp');

							// alert(idPerusahaan);

							$('#edit_id_perusahaan').val(idPerusahaan);
							// document.getElementById("edit_id_perusahaan").val(idPerusahaan);
							$('#edit_nama_perusahaan').val(namaPerusahaan);
							// document.getElementById("edit_nama_perusahaan").val(namaPerusahaan);
							// $('#edit_alamat').val(alamatPerusahaan);
							document.getElementById("edit_alamat").innerHTML = alamatPerusahaan;
							$('#edit_telepon').val(teleponPerusahaan);
							// document.getElementById("edit_telepon").val(teleponPerusahaan);
						});

						$('#edit_perusahaan_modal').submit(function(e){
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('perusahaan/do/edit')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("edit_perusahaan_modal").reset();
							      	$('#editPerusahaanModal').modal("hide");
							      	toastFire('success','Berhasil Ubah Data Perusahaan');
							      	$('#search_perusahaan').click();
						      },
						  });
						  return false;
						});
					// END
				// End

				// Config TOP
					fill_datatable_top();
					function fill_datatable_top(){
						$('#top_list').DataTable({
							"paging"		: true,
							"lengthChange"	: false,
							"searching"		: false,
							"ordering"		: false,
							"info"			: true,
							"autoWidth"		: false,
							"scrollX"		: true,
							"scrollY"		: true,
							"ajax"			: {
								url		: "<?php echo base_url('top/list') ?>",
								type	: "GET"
							},
						});
					}

					// ADD TOP
						$('#add_top_modal').submit(function(e){
						  if(!validateFormWajib()) return false;
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('top/do/add')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("add_top_modal").reset();
							      	$('#addTOPModal').modal("hide");
							      	$('#top_list').DataTable().destroy();
							      	fill_datatable_top();
							      	toastFire('success','Berhasil Tambah Data Term of Payment (TOP)');
						      },
						  });
						  return false;
						});
					// END

					// EDIT TOP
						$(document).on("click", ".edit_top", function () {
							var idTop = $(this).data('idtop');
							var top = $(this).data('top');
							var keteranganTop = $(this).data('keterangantop');

							$('#edit_id_top').val(idTop);
							$('#edit_top_top').val(top);
							$('#edit_keterangan_top').val(keteranganTop);
						});

						$('#edit_top_modal').submit(function(e){
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('top/do/edit')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("edit_top_modal").reset();
							      	$('#editTOPModal').modal("hide");
							      	$('#top_list').DataTable().destroy();
							      	fill_datatable_top();
							      	toastFire('success','Berhasil Ubah Data Term of Payment (TOP)');
						      },
						  });
						  return false;
						});
					// END
				// End

				// Config Tanggal Acuan
					fill_datatable_tanggal_acuan();
					function fill_datatable_tanggal_acuan(){
						$('#tanggal_acuan_list').DataTable({
							"paging"		: true,
							"lengthChange"	: false,
							"searching"		: false,
							"ordering"		: false,
							"info"			: true,
							"autoWidth"		: false,
							"scrollX"		: true,
							"scrollY"		: true,
							"ajax"			: {
								url		: "<?php echo base_url('tanggal-acuan/list') ?>",
								type	: "GET"
							},
						});
					}

					// ADD TANGGAL ACUAN
						$('#add_tanggal_acuan_modal').submit(function(e){
						  if(!validateFormWajib()) return false;
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('tanggal-acuan/do/add')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("add_tanggal_acuan_modal").reset();
							      	$('#addTanggalAcuanModal').modal("hide");
							      	$('#tanggal_acuan_list').DataTable().destroy();
							      	fill_datatable_tanggal_acuan();
							      	toastFire('success','Berhasil Tambah Tanggal Acuan');
						      },
						  });
						  return false;
						});
					// END

					// EDIT TANGGAL ACUAN
						$(document).on("click", ".edit_tanggalacuan", function () {
							var idTanggalAcuan = $(this).data('idtanggalacuan');
							var tanggal_acuan = $(this).data('tanggalacuan');
							var keterangantanggal_acuan = $(this).data('keterangantanggalacuan');

							$('#edit_id_tanggal_acuan').val(idTanggalAcuan);
							$('#edit_tanggal_acuan').val(tanggal_acuan);
							$('#edit_keterangan_tanggal_acuan').val(keterangantanggal_acuan);
						});

						$('#edit_tanggal_acuan_modal').submit(function(e){
						  var formData = new FormData(this);
						  e.preventDefault();
						  $.ajax({
						      type : "POST",
						      url  : "<?php echo site_url('tanggal-acuan/do/edit')?>",
						      data : formData,
						      processData:false,
						      contentType:false,
						      cache:false,
						      async:false,
						      success: function(data){
							      	document.getElementById("edit_tanggal_acuan_modal").reset();
							      	$('#editTanggalAcuanModal').modal("hide");
							      	$('#tanggal_acuan_list').DataTable().destroy();
							      	fill_datatable_tanggal_acuan();
							      	toastFire('success','Berhasil Ubah Data Tanggal Acuan');
						      },
						  });
						  return false;
						});
					// END
				// End

			// End
		<?php endif;?>
		
		<?php if ($title == 'Export'): ?>
			$('#loading').modal('hide');
			// Halaman Export .xls
				// Summary
					$(document).on("click", ".export_summary", function () {
					  var pt = $('#nama_pt_export').val();
					  var user = $('#dibuat_oleh_export').val();

					  console.log(pt);
					  console.log(user);

					  if (pt.length != 0) {
					  	window.open('export/summary?pt='+pt+'&user='+user);
					  } else {
					  	alerttoast('Isi Nama PT');
					  }
					  
					});

				// KKP
					$(document).on("click", ".export_kkp", function () {
					  var pt = $('#nama_pt_export').val();
					  var user = $('#dibuat_oleh_export').val();

					  console.log(pt);
					  console.log(user);

					  if (pt.length != 0) {
					  	window.open('export/kkp?pt='+pt+'&user='+user);
					  } else {
					  	alerttoast('Isi Nama PT');
					  }
					  
					});
			// End
		<?php endif ?>
		
	</script>
</body>
</html>