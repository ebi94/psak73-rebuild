<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>PSAK73 | Login</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE'); ?>/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style type="text/css">
		/* Coded with love by Mutiullah Samim */
			body,
			html {
				margin: 0;
				padding: 0;
				height: 100%;
				background: #dce6de !important;
			}
			.user_card {
				height: 400px;
				width: 350px;
				margin-top: 10%;
				margin-bottom: 10%;
				background: #f39c12;
				position: relative;
				display: flex;
				justify-content: center;
				flex-direction: column;
				padding: 10px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				border-radius: 5px;

			}
			.brand_logo_container {
				position: absolute;
				/*height: 170px;*/
				/*width: 170px;*/
				top: -5%;
				border-radius: 50%;
				background: #dce6de;
				padding: 10px;
				text-align: center;
			}
			.brand_logo {
				height: 150px;
				width: 150px;
				border-radius: 50%;
				border: 2px solid white;
			}
			.form_container {
				margin-top: 2%;
			}
			.login_btn {
				width: 100%;
				background: #c0392b !important;
				color: white !important;
			}
			.login_btn:focus {
				box-shadow: none !important;
				outline: 0px !important;
			}
			.login_container {
				padding: 0 2rem;
			}
			.input-group-text {
				background: #c0392b !important;
				color: white !important;
				border: 0 !important;
				border-radius: 0.25rem 0 0 0.25rem !important;
			}
			.input_user,
			.input_pass:focus {
				box-shadow: none !important;
				outline: 0px !important;
			}
			.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
				background-color: #c0392b !important;
			}
	</style>
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url('assets/image/Logo.png'); ?>" alt="Logo" height="70">
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<b><h1>PSAK73</h1></b>
				</div>
				<div class="d-flex justify-content-center">
					<div class="alert alert-danger" id="error_alert" role="alert" style="display: none;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong><i class="fas fa-exclamation-circle"></i> Username / Password Salah!</strong>
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form enctype="multipart/form-data" name="form" role="form" id="login_form">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<div class="input-group-text"><span class="fas fa-user"></span></div>
							</div>
							<input type="email" name="username" class="form-control wajib_isi" placeholder="username" oninput="this.className = 'form-control wajib_isi'">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<div class="input-group-text"><span class="fas fa-key"></span></div>
							</div>
							<input type="password" name="password" class="form-control wajib_isi" placeholder="password" oninput="this.className = 'form-control wajib_isi'">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="button" class="btn login_btn">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/AdminLTE'); ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/AdminLTE'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/AdminLTE'); ?>/dist/js/adminlte.min.js"></script>

	<script type="text/javascript">
		function validateFormWajib() {
		  // This function deals with validation of the form fields
		  var y, i, valid = true;
		  y = document.getElementsByClassName("wajib_isi");		  // A loop that checks every input field in the current tab:
		  for (i = 0; i < y.length; i++) {
		    // If a field is empty...
		    if (y[i].value == "" || y[i].value == null) {
		      // add an "invalid" class to the field:
		      y[i].className += " is-invalid";
		      // and set the current valid status to false:
		      valid = false;
		    }
		  }
		  return valid; // return the valid status
		}

		$('#login_form').submit(function(e){
		  if(!validateFormWajib()) return false;
		  var formData = new FormData(this);
		  e.preventDefault();
		  $.ajax({
		      type : "POST",
		      url  : "<?php echo site_url('log/do/login')?>",
		      data : formData,
		      processData:false,
		      contentType:false,
		      cache:false,
		      async:false,
		      success: function(data){
			      	if (data != 0) {
			      		window.location.replace(data);
			      	} else {
			      		// alert(data);
			      		$('#error_alert').show()
			      	}
		      },
		  });
		  return false;
		});
	</script>
</body>
</html>