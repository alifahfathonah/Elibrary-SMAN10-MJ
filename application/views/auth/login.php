<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/_partial/head') ?>
</head>

<body class="bg-gray-200">

	<main class="main-content  mt-0">
		<div class="page-header align-items-start min-vh-100"
			style="background-image: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
			<span class="mask bg-gradient-dark opacity-6"></span>
			<div class="container my-auto">
				<div class="row">
					<div class="col-lg-4 col-md-8 col-12 mx-auto">
						<div class="card z-index-0 fadeIn3 fadeInBottom">
							<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
								<div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
									<h4 class="text-white font-weight-bolder text-center mt-2 mb-0">E-Library</h4>
								</div>
							</div>
							<div class="card-body">
								<form role="form" class="text-start" action="<?= base_url('auth/proses') ?>"
									method="post">
									<div class="input-group input-group-outline my-3">
										<label class="form-label">Username</label>
										<input type="text" name="username" required class="form-control">
									</div>
									<div class="input-group input-group-outline mb-3">
										<label class="form-label">Password</label>
										<input type="password" name="password" required class="form-control">
									</div>
									<div class="form-check form-switch d-flex align-items-center mb-3">
									</div>
									<div class="text-center">
										<button type="submit" name="login"
											class="btn bg-gradient-success w-100 my-4 mb-2">Login</button>
									</div>
									<?php echo $this->session->flashdata('msg') ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--   Core JS Files   -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	<script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}

	</script>
	<script src="<?= base_url() ?>/assets/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>
