<nav id="navbarscrl" class="navbar navbar-expand-lg  sticky-top navbar-dark bg-secondary">
	<div class="container">
		<a class="navbar-brand fw-bold" href="<?= base_url() ?>">
			<img src="<?= base_url('assets/img/icon/LOGO_SMAN_10-removebg-preview.png') ?>" alt="logo" class="w-6">
			E-Library
		</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ms-auto">
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == '' ) echo 'active' ?>"" href="<?= base_url() ?>">Home</a>
				<!-- <a class="nav-link fw-bold <?php if($this->uri->segment(1) == '#galeri' ) echo 'active text-white' ?>"" href="<?= base_url() ?>#galeri">Galeri</a> -->
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == '#lokasi' ) echo 'active text-white' ?>"" href="<?= base_url() ?>#lokasi">Lokasi</a>
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == 'buku' ) echo 'active text-white' ?>" href="<?= base_url('buku') ?>">E-Library</a>
				<?php if(!check_user_login()) :  ?>
					<a class="nav-link fw-bold " href="<?= base_url('auth/login') ?>"><i class="fa fa-sign-in me-sm-1 "></i>Login</a>
				<?php endif ?>
			</div>
		</div>
		<?php if(check_user_login()) : ?>
		<div class="navbar-nav">
			<div class=" fw-bold d-flex justify-content-start">
				<li class="nav-item align-items-center dropdown ">
					<a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton"
						data-bs-toggle="dropdown">
						<i class="fa fa-user me-sm-1 "></i>
						<span class="d-sm-inline d-inline nav-link"><?= strtoupper($this->session->userdata('username')) ?></span>
					</a>
					<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
						aria-labelledby="dropdownMenuButton">
						<li class="mb-2">
							<a class="dropdown-item border-radius-md" href="<?= (is_admin()) ? base_url('admin/dashboard') : base_url('pengguna/profil/') ?>">
								<div class="d-flex py-1">
									<div class="my-auto">
										<img src="<?= ($this->session->userdata('foto') != '') ? 
														base_url('assets/img/profil/').$this->session->userdata('foto') : base_url('assets/img/profil/avatar.png')
													?>" class="avatar avatar-sm  me-3 ">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="text-sm font-weight-normal mb-1">
											<span class="font-weight-bold"><?= ucwords($this->session->userdata('nama')) ?></span>
										</h6>
										<p class="text-xs text-secondary mb-0">
											<i class="fa fa-briefcase me-1"></i>
											<?= $this->session->userdata('role') ?>
										</p>
									</div>
								</div>
							</a>
						</li>
						<li class="d-flex justify-content-end">
							<a href="<?= base_url('auth/logout') ?>" class="w-100 btn btn-danger"><i class="fa fa-sign-out me-1"></i> Logout</a>
						</li>
					</ul>
				</li>
			</div>
		</div>
		<?php endif ?>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</nav>