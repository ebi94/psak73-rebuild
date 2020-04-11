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
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
	<!-- MDB -->
    <link rel="stylesheet" href="<?php echo base_url('assets/mdb'); ?>/mdb.css">
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

		.tab_step_edit {
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

		#overlay-loading {
			position: fixed;
			display: none;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(0,0,0,0.5);
			z-index: 99999;
		}

		#img-loading {
			position: absolute;
			top: 50%;
			left: 50%;
			font-size: 50px;
			color: white;
			transform: translate(-50%,-50%);
			-ms-transform: translate(-50%,-50%);
		}

		.mdb-select {
			min-width: 100% !important;
		}

		ul#select-options-dibuat_oleh_export li.select-toggle-all span {
			display: none !important;
		}

		ul#select-options-dibuat_oleh_export {
			max-height: 250px !important;
		}

		.btn-list {
			width: 100%;
		}

		.div-search {
			justify-content: flex-end;
    		margin-top: 20px;
		}

		#search_aset .fa-search:before {
			margin-right: 10px
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

	<?php $this->load->view('modal/editProfile');?>


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

	<!-- MDB -->
	<script src="<?php echo base_url('assets/mdb'); ?>/mdb.js"></script>

	<script type="text/javascript">
	// The Calender
		
	// Material Select Initialization
		$(document).ready(function() {
			$('.mdb-select').materialSelect({selectAll: false});
		});

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
						"drawCallback": function (settings) { 
							// Here the response
							var response = settings.json;
							console.log(response);
						},
					});
				}

				$('#search_aset').on('click',function(){
					var pt = $('#pt').val();
					var kontrak = $('#kontrak').val();
					var vendor = $('#searchVendor').val();
					var dibuat_oleh = $('#dibuat_oleh').val();

					console.log(pt);
					console.log(dibuat_oleh);
					// alert(dibuat_oleh);

					$('#aset_list').DataTable().destroy();
					// $('#aset_list').show();
					fill_datatable_aset(pt,kontrak,vendor,dibuat_oleh);
				});

				// ADD ASET
					document.getElementById("submit_form").style.display = "none";
					var currentTab = 0; // Current tab is set to be the first tab (0)
					showTab(currentTab); // Display the current tab

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

					// Edit ASET
					document.getElementById("submit_form_edit").style.display = "none";
					var currentTab = 0; // Current tab is set to be the first tab (0)
					showTabEdit(currentTab); // Display the current tab

					function showTabEdit(n) {
					  // This function will display the specified tab of the form ...
					  var x = document.getElementsByClassName("tab_step_edit");
					  x[n].style.display = "block";
					  // ... and fix the Previous/Next buttons:
					  if (n == 0) {
					    document.getElementById("prevBtnEdit").style.display = "none";
					  } else {
					    document.getElementById("prevBtnEdit").style.display = "inline";
					  }
					  if (n == (x.length - 1)) {
					  	// alert('akhir');
					  	document.getElementById("nextBtnEdit").style.display = "none";
					  	document.getElementById("submit_form_edit").style.display = "inline";
					  } else {
					    document.getElementById("nextBtnEdit").innerHTML = "Selanjutnya";
					  }

					  document.getElementById("jumlahEdit").innerHTML = x.length;
					  // ... and run a function that displays the correct step indicator:
					  // fixStepIndicator(n)
					}

					function nextPrevEdit(n) {
					  // This function will figure out which tab to display
					  var x = document.getElementsByClassName("tab_step_edit");
					  var val = document.getElementById("stepEdit").innerHTML;
					  // Exit the function if any field in the current tab is invalid:
					  if (n == 1 && !validateFormEdit()) return false;
					  // Hide the current tab:
					  x[currentTab].style.display = "none";
					  // Increase or decrease the current tab by 1:
					  currentTab = currentTab + n;
					  document.getElementById("stepEdit").innerHTML = parseInt(val) + n;
					  if (n == -1) {
					  	document.getElementById("nextBtnEdit").style.display = "inline";
					  	document.getElementById("submit_form_edit").style.display = "none";
					  }
				  	  // Otherwise, display the correct tab:
				  	  // alert(currentTab);
				  	  showTabEdit(currentTab);
					}

					function validateFormEdit() {
					  // This function deals with validation of the form fields
					  var x, y, i, valid = true;
					  x = document.getElementsByClassName("tab_step_edit");
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

					// Edit Tab step

					$('#add_modal_aset').on('keyup keypress', function(e) {
					  var keyCode = e.keyCode || e.which;
					  if (keyCode === 13) { 
					    e.preventDefault();
					    return false;
					  }
					});

					$('#edit_modal_aset').on('keyup keypress', function(e) {
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
						      	$('#addAsetModal').modal('hide');
						      	$('.inputan').html(data);
						      	// $('#addPlusAsetModal').modal({backdrop: 'static', keyboard: false});
						      	// document.getElementById("no_kontrak_plus").innerHTML = data;
						      	$('#addPlusAsetModal').modal('show');
					      },
					  });
					  return false;
					});

					$('#btnPlusAset').on('click', function(){
						var idKontrak = $("#vIdKon").val();
						var namapt = $("#vNamapt").val();
						var nomorkontrak = $("#vNomorKontrak").val();
						var vendor = $("#vVendor").val();
						$('#viewAsetModal').modal('hide');
						$('#addAsetModal').modal('show');
						$("#title_add_aset").val("Add Plus New Aset");
						$("#id_kontrak").val(idKontrak);
						$("#namapt").val(namapt);
						$("#nomorkontrak").val(nomorkontrak);
						$("#vendor").val(vendor);
						document.getElementById("namapt").disabled = true;
						document.getElementById("nomorkontrak").disabled = true;
						document.getElementById("vendor").disabled = true;
						document.getElementById("customFile").disabled = true;
						document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
					});

					$('#edit_modal_aset').submit(function(e){
					  var formData = new FormData(this);
					  e.preventDefault();
					  $.ajax({
					      type : "POST",
					      url  : "<?php echo site_url('aset/do/edit')?>",
					      data : formData,
					      processData:false,
					      contentType:false,
					      cache:false,
					      async:false,
					      success: function(data){
						      	document.getElementById("edit_modal_aset").reset();
						      	$('#editAsetModal').modal("hide");
								$('#search_aset').click();
								toastFire('success','Data Berhasil di Ubah');
						      	// $('.inputan').html(data);
						      	// $('#editPlusAsetModal').modal({backdrop: 'static', keyboard: false});
						      	// document.getElementById("no_kontrak_plus").innerHTML = data;
						      	// $('#addPlusAsetModal').modal('show');
					      },
					  });
					  return false;
					});

					$('#addPlusAset').on('click', function(){
						// var idKontrak = document.getElementById("id_kontraks").val();
						var idKontrak = $("#id_kontraks").val();
						var namapt = $("#a_namapt").val();
						var nomorkontrak = $("#a_nomorkontrak").val();
						var vendor = $("#a_vendor").val();
						$("#namapt").val(namapt);
						$("#nomorkontrak").val(nomorkontrak);
						$("#vendor").val(vendor);
						document.getElementById("namapt").disabled = true;
						document.getElementById("nomorkontrak").disabled = true;
						document.getElementById("vendor").disabled = true;
						document.getElementById("customFile").disabled = true;
						$('#addPlusAsetModal').modal('hide');
						$("#title_add_aset").val("Add Plus New Aset");
						$("#id_kontrak").val(idKontrak);
						nextPrev(-8);
						// document.getElementById("close-modal").id = 'close-modal-tambah';
						document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
						$('#addAsetModal').modal('show');
					});

					$('.btnEditAset').on('click', function(){
						document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
						$('#editAsetModal').modal("show");
					});

					$('.btnViewAset').on('click', function(){
						$('#viewAsetModal').modal("show");
					});

					$('#close-modal-add').on('click', function(){
						$('#confirmCloseModal').modal("show");
					});

					$('#confirmYes').on('click', function(){
						$('#confirmCloseModal').modal("hide");
						$('#addAsetModal').modal("hide");
						document.getElementById("namapt").disabled = false;
						document.getElementById("nomorkontrak").disabled = false;
						document.getElementById("vendor").disabled = false;
						document.getElementById("customFile").disabled = false;
						document.getElementById("add_modal_aset").reset();
					});

					$('#deleteYes').on('click', function(){
						var idSummary = $('#deleteId').val();
						$.ajax({
							type : "POST",
							url  : "<?php echo site_url('aset/do/delete')?>",
							dataType: "JSON",
							data: {
								idSummary: idSummary
							},
							success: function(data){
									$('#deleteAsetModal').modal("hide");
									toastFire('success','Data Berhasil di Hapus');
									$('#search_aset').click();
							},
						});
						return false;
					});

				// end
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
							"pageLength"	: 5,
							"ajax"			: {
								url		: "<?php echo base_url('perusahaan/list') ?>",
								type	: "GET",
								data	: {
									pt:pt,
									alamat:alamat
								}
							},
							"drawCallback": function (settings) { 
								// Here the response
								var response = settings.json;
								console.log(response);
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
						//   if(!validateFormWajib()) return false;
						//   alert('tambah');
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

						// Delete Perusahaan 
						$(document).on("click", ".delete_perusahaan", function () {
							var id = $(this).data('idp');
							$('#delete_id_perusahaan').val(id);
						});

							$('#deletePerusahaan').on('click', function(){
							var id = $('#delete_id_perusahaan').val();
							$.ajax({
								type : "POST",
								url  : "<?php echo site_url('perusahaan/do/delete')?>",
								dataType: "JSON",
								data: {
									id: id
								},
								success: function(data){
										$('#deletePerusahaanModal').modal("hide");
										toastFire('success','Data Berhasil di Hapus');
										$('#search_perusahaan').click();
								},
							});
							return false;
						});

						// Delete Tanggal Acuan
						$(document).on("click", ".delete_tanggalacuan", function () {
							var id = $(this).data('idp');
							$('#delete_id_tanggalacuan').val(id);
						});

						$('#deleteTanggalAcuan').on('click', function(){
							var id = $('#delete_id_tanggalacuan').val();
							$.ajax({
								type : "POST",
								url  : "<?php echo site_url('tanggal-acuan/do/delete')?>",
								dataType: "JSON",
								data: {
									id: id
								},
								success: function(data){
										$('#deleteTanggalAcuanModal').modal("hide");
										toastFire('success','Data Berhasil di Hapus');
										$('#tanggal_acuan_list').DataTable().destroy();
										fill_datatable_tanggal_acuan();
								},
							});
							return false;
						});
					// END

					// Delete Term of Payment
						$(document).on("click", ".delete_top", function () {
							var id = $(this).data('idp');
							$('#delete_id_top').val(id);
						});

						$('#deleteTop').on('click', function(){
							var id = $('#delete_id_top').val();
							$.ajax({
								type : "POST",
								url  : "<?php echo site_url('top/do/delete')?>",
								dataType: "JSON",
								data: {
									id: id
								},
								success: function(data){
										$('#deleteTopModal').modal("hide");
										toastFire('success','Data Berhasil di Hapus');
										$('#top_list').DataTable().destroy();
										fill_datatable_top();
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
							"paging"		: false,
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
						//   if(!validateFormWajib()) return false;
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
							"paging"		: false,
							"lengthChange"	: false,
							"searching"		: false,
							"ordering"		: false,
							"info"			: true,
							"autoWidth"		: true,
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
						//   if(!validateFormWajib()) return false;
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
			// $('#loading').modal('hide');
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

				// CALCULATION
					$(document).on("click", ".export_calculation", function () {
					  var pt = $('#nama_pt_export').val();
					  var user = $('#dibuat_oleh_export').val();

					  console.log(pt);
					  console.log(user);

					  if (pt.length != 0) {
					  	window.open('export/calculation?pt='+pt+'&user='+user);
					  } else {
					  	alerttoast('Isi Nama PT');
					  }
					  
					});
			// End
		<?php endif ?>

		<?php if($title == 'Schedule'): ?>
			// Halaman List Schedule
				var pt_schedule = '';
				var dibuat_oleh_schedule = '';
				fill_datatable_schedule(pt_schedule,dibuat_oleh_schedule);
				function fill_datatable_schedule(pt = '', dibuat_oleh = ''){
					$('#schedule_list').DataTable({
						"paging"		: true,
						"lengthChange"	: false,
						"searching"		: false,
						"ordering"		: false,
						"info"			: true,
						"autoWidth"		: false,
						"scrollX"		: true,
						"scrollY"		: true,
						"ajax"			: {
							url		: "<?php echo base_url('schedule/list') ?>",
							type	: "GET",
							data	: {
								pt:pt,
								dibuat_oleh:dibuat_oleh
							}
						},
					});
				}

				$('#search_schedule').on('click',function(){
					// alert('click');
					var pt = $('#nama_pt_schedule').val();
					var dibuat_oleh = $('#dibuat_oleh_schedule').val();

					console.log(pt);
					console.log(dibuat_oleh);
					
					$('#schedule_list').DataTable().destroy();
					
					fill_datatable_schedule(pt,dibuat_oleh);
				});

				// Export
					$(document).on("click", ".export_schedule", function () {
						var id_sum = $(this).data('idsummary');
						// alert(id_sum);
						window.open('schedule/export?id_summary=' + id_sum);
					});
		<?php endif; ?>
		
	</script>
	<script type="text/javascript">
		$(document).on("click", ".btnEditAset", function () {
			var idkontrak = $(this).data('idkontrak');
			var idcalculation = $(this).data('idcalculation');
			var idsummary = $(this).data('idsummary');
			var namapt = $(this).data('namapt');
			var nomorkontrak = $(this).data('nomorkontrak');
			var vendor = $(this).data('vendor');
			var jenissewa = $(this).data('jenissewa');
			var serialnumber = $(this).data('serialnumber');
			var pageinpdf = $(this).data('pageinpdf');
			var nsa = $(this).data('nsa');
			var nsb = $(this).data('nsb');
			var nsc = $(this).data('nsc1');
			var nsc2 = $(this).data('nsc2');
			var nsd1 = $(this).data('nsd1');
			var nsd2 = $(this).data('nsd2');
			var is1 = $(this).data('is1');
			var is2 = $(this).data('is2');
			var is3 = $(this).data('is3');
			var is4 = $(this).data('is4');
			var is5 = $(this).data('is5');
			var is6 = $(this).data('is6');
			var is7 = $(this).data('is7');
			var ks1 = $(this).data('ks1');
			var ks2 = $(this).data('ks2');
			var ks3 = $(this).data('ks3');
			var ks4 = $(this).data('ks4');
			var ks5 = $(this).data('ks5');
			var lokasi = $(this).data('lokasi');
			var startdate = $(this).data('startdate');
			var enddate = $(this).data('enddate');
			var nilaikontrak = $(this).data('nilaikontrak');
			var dr = $(this).data('dr');
			var pat = $(this).data('pat');
			var top = $(this).data('top');
			var awak = $(this).data('awak');
			var frekuensi = $(this).data('frekuensi');
			var pd = $(this).data('pd');
			var prepaid = $(this).data('prepaid');
			var status_ppn = $(this).data('status_ppn');
			var ppn = $(this).data('ppn');
			var jumlah_unit = $(this).data('jumlah_unit');
			var satuan = $(this).data('satuan');
			var nilai_asumsi_perpanjangan = $(this).data('nilai_asumsi_perpanjangan');
			var tgl_perpanjangan = $(this).data('tgl_perpanjangan');
			$("#id_ekontrak").val(idkontrak);
			$("#id_ecalculation").val(idcalculation);
			$("#id_esummary").val(idsummary);
			$("#enamapt").val(namapt);
			$("#enomorkontrak").val(nomorkontrak);
			$("#evendor").val(vendor);
			$("#ejenissewa").val(jenissewa);
			$("#eserialnumber").val(serialnumber);
			$("#epageinpdf").val(pageinpdf);
			$("#ensa").val(nsa);
			$("#ensb").val(nsb);
			$("#ensc").val(nsc1);
			$("#ensc2").val(nsc2);
			$("#ensd1").val(nsd1);
			$("#ensd2").val(nsd2);
			$("#eis1").val(is1);
			$("#eis2").val(is2);
			$("#eis3").val(is3);
			$("#eis4").val(is4);
			$("#eis5").val(is5);
			$("#eis6").val(is6);
			$("#eis7").val(is7);
			$("#eks1").val(ks1);
			$("#eks2").val(ks2);
			$("#eks3").val(ks3);
			$("#eks4").val(ks4);
			$("#eks5").val(ks5);
			$("#elokasi").val(lokasi);
			$("#estartdate").val(startdate);
			$("#eenddate").val(enddate);
			$("#enilaikontrak").val(nilaikontrak);
			$("#edr").val(dr);
			$("#epat").val(pat);
			$("#etop").val(top);
			$("#eawak").val(awak);
			$("#efrekuensi").val(frekuensi);
			$("#epd").val(pd);
			$("#eprepaid").val(prepaid);
			$("#estatus_ppn").val(status_ppn);
			$("#eppn").val(ppn);
			$("#ejumlah_unit").val(jumlah_unit);
			$("#esatuan").val(satuan);
			$("#enilai_asumsi_perpanjangan").val(nilai_asumsi_perpanjangan);
			$("#etgl_perpanjangan").val(tgl_perpanjangan);
		});	

		$(document).on("click", ".btnViewAset", function () {
			var idkontrak = $(this).data('idkontrak');
			var idsummary = $(this).data('idsummary');
			var namapt = $(this).data('namapt');
			var nomorkontrak = $(this).data('nomorkontrak');
			var vendor = $(this).data('vendor');
			var jenissewa = $(this).data('jenissewa');
			var serialnumber = $(this).data('serialnumber');
			var pageinpdf = $(this).data('pageinpdf');
			var nsa = $(this).data('nsa');
			var nsb = $(this).data('nsb');
			var nsc = $(this).data('nsc1');
			var nsc2 = $(this).data('nsc2');
			var nsd1 = $(this).data('nsd1');
			var nsd2 = $(this).data('nsd2');
			var is1 = $(this).data('is1');
			var is2 = $(this).data('is2');
			var is3 = $(this).data('is3');
			var is4 = $(this).data('is4');
			var is5 = $(this).data('is5');
			var is6 = $(this).data('is6');
			var is7 = $(this).data('is7');
			var ks1 = $(this).data('ks1');
			var ks2 = $(this).data('ks2');
			var ks3 = $(this).data('ks3');
			var ks4 = $(this).data('ks4');
			var ks5 = $(this).data('ks5');
			var lokasi = $(this).data('lokasi');
			var startdate = $(this).data('startdate');
			var enddate = $(this).data('enddate');
			var nilaikontrak = $(this).data('nilaikontrak');
			var dr = $(this).data('dr');
			var pat = $(this).data('pat');
			var top = $(this).data('top');
			var awak = $(this).data('awak');
			var frekuensi = $(this).data('frekuensi');
			var pd = $(this).data('pd');
			var prepaid = $(this).data('prepaid');
			var status_ppn = $(this).data('status_ppn');
			var ppn = $(this).data('ppn');
			var jumlah_unit = $(this).data('jumlah_unit');
			var satuan = $(this).data('satuan');
			var nilai_asumsi_perpanjangan = $(this).data('nilai_asumsi_perpanjangan');
			var tgl_perpanjangan = $(this).data('tgl_perpanjangan');
			var pdfurl = $(this).data('pdfurl');
			$("#idkontrak").val(idkontrak);
			$("#vIdKon").val(idkontrak);
			$("#vidsummary").html(idsummary);
			$("#vnamapt").html(namapt);
			$("#vnomorkontrak").html(nomorkontrak);
			$("#vvendor").html(vendor);
			$("#vjenissewa").html(jenissewa);
			$("#vserialnumber").html(serialnumber);
			$("#vpageinpdf").html(pageinpdf);
			$("#vnsa").html(nsa);
			$("#vnsb").html(nsb);
			$("#vnsc").html(nsc1);
			$("#vnsc2").html(nsc2);
			$("#vnsd1").html(nsd1);
			$("#vnsd2").html(nsd2);
			$("#vis1").html(is1);
			$("#vis2").html(is2);
			$("#vis3").html(is3);
			$("#vis4").html(is4);
			$("#vis5").html(is5);
			$("#vis6").html(is6);
			$("#vis7").html(is7);
			$("#vks1").html(ks1);
			$("#vks2").html(ks2);
			$("#vks3").html(ks3);
			$("#vks4").html(ks4);
			$("#vks5").html(ks5);
			$("#vlokasi").html(lokasi);
			$("#vstartdate").html(startdate);
			$("#venddate").html(enddate);
			$("#vnilaikontrak").html(nilaikontrak);
			$("#vdr").html(dr);
			$("#vpat").html(pat);
			$("#vtop").html(top);
			$("#vawak").html(awak);
			$("#vfrekuensi").html(frekuensi);
			$("#vpd").html(pd);
			$("#vprepaid").html(prepaid);
			$("#vstatus_ppn").html(status_ppn);
			$("#vppn").html(ppn);
			$("#vjumlah_unit").html(jumlah_unit);
			$("#vsatuan").html(satuan);
			$("#vnilai_asumsi_perpanjangan").html(nilai_asumsi_perpanjangan);
			$("#vtgl_perpanjangan").html(tgl_perpanjangan);
			$("embed#pdfobject").attr('src' , 'assets/pdf/'+pdfurl);
			// Data on Add Plus Aset Button
			$("#vNamapt").val(namapt);
			$("#vNomorKontrak").val(nomorkontrak);
			$("#vVendor").val(vendor);
		});	

		$(document).on("click", "#close-modal-lihat", function() {
			location.reload();
		});

		$(document).on("click", ".btnDeleteAset", function () {
			var idSummary = $(this).data('deleteid');
			$("#deleteId").val(idSummary);
		});	
		
		</script>
		<script type="text/javascript">
			function reverseNumber(input) {
				return [].map.call(input, function(x) {
					return x;
				}).reverse().join('');
			}

			function plainNumber(number) {
				return number.split('.').join('');
			}

			function splitInDots(input) {

				var value = input.value,
					plain = plainNumber(value),
					reversed = reverseNumber(plain),
					reversedWithDots = reversed.match(/.{1,3}/g).join('.'),
					normal = reverseNumber(reversedWithDots);

				console.log(plain, reversed, reversedWithDots, normal);
				input.value = normal;
			}

			function oneDot(input) {
				var value = input.value,
					value = plainNumber(value);

				if (value.length > 3) {
					value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
				}
				console.log(value);
				input.value = value;
			}
		</script>
</body>
</html>