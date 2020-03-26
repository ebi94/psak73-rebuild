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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/sweetalert2/sweetalert2.min.css">
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
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url('assets/adminLTE'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
		$('#aset_list').hide();

		// Halaman List Aset
			<?php if ($title == 'List Aset'):?>

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

					$('#aset_list').DataTable().destroy();
					$('#aset_list').show();
					fill_datatable_aset(pt,kontrak,vendor,dibuat_oleh);
				});

				// ADD ASET
					document.getElementById("submit_form").style.display = "none";
					var currentTab = 0; // Current tab is set to be the first tab (0)
					showTab(currentTab); // Display the current tab

				// EDIT ASET
					document.getElementById("submit_form_edit").style.display = "none";
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

					$('.btnEditAset').on('click', function(){
						// var idKontrak = document.getElementById("id_kontraks").val();
						$('#addPlusAsetModal').modal('hide');
						$("#title_add_aset").val("Add Plus New Aset");
						$("#id_kontrak").val(idKontrak);
						nextPrev(-8);
						// document.getElementById("close-modal").id = 'close-modal-tambah';
						document.getElementById("nextBtn").style.display = "inline";
					  	document.getElementById("submit_form").style.display = "none";
						$('#editAsetModal').modal("show");
					});

					$('.btnViewAset').on('click', function(){
						$('#viewAsetModal').modal("show");
					});
				// end
			<?php endif; ?>
		// End
	</script>
	<script type="text/javascript">
		$(document).on("click", ".btnEditAset", function () {
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
		var komponen = $(this).data('komponen');
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
		$("#idkontrak").val(idkontrak);
		$("#eidsummary").val(idsummary);
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
		$("#ekomponen").val(komponen);
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