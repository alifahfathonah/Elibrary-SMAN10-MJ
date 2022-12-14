<aside
	class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
	id="sidenav-main">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
			aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href="<?= base_url('dashboard') ?>">
			<img src="<?= base_url('assets/img/icon/LOGO_SMAN_10-removebg-preview.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
			<span class="font-weight-bold ms-2 text-white" translate="no">E-Library</span>
		</a>
	</div>
	<hr class="horizontal light mt-0 mb-2">
	<div class="collapse navbar-collapse  w-auto h-auto max-height-vh-100" id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/dashboard') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">dashboard</i>
					</div>
					<span class="nav-link-text ms-1">Dashboard</span>
				</a>
			</li> 
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data Buku</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(3) == 'buku' || $this->uri->segment(3) == 'detailbuku'|| $this->uri->segment(2) == '') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/data/buku') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">book</i>
					</div>
					<span class="nav-link-text ms-1">Data Buku</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(3) == 'kategori' || $this->uri->segment(2) == '') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/data/kategori') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">list</i>
					</div>
					<span class="nav-link-text ms-1">Kategori Buku</span>
				</a>
			</li>
      <!-- <li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Transaksi</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(3) == 'peminjaman' || $this->uri->segment(3) == 'tambahpinjam') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/transaksi/peminjaman') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">table_view</i>
					</div>
					<span class="nav-link-text ms-1" >Peminjaman</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(3) == 'pengembalian') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/transaksi/pengembalian') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">receipt_long</i>
					</div>
					<span class="nav-link-text ms-1">Pengembalian</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laporan</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(2) == 'laporan') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/laporan') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">print</i>
					</div>
					<span class="nav-link-text ms-1">Cetak Laporan</span>
				</a>
			</li> -->
			<?php //if(is_admin()) : ?>
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pengaturan</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(2) == 'pengguna') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/pengguna') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">person</i>
					</div>
					<span class="nav-link-text ms-1">User Management</span>
				</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link text-white <?php if($this->uri->segment(3) == 'denda') echo 'active bg-gradient-primary' ?>" href="<?= base_url('admin/data/denda') ?>">
					<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10" translate="no">local_atm</i>
					</div>
					<span class="nav-link-text ms-1">Denda</span>
				</a>
			</li> -->
			<?php //endif ?>
		</ul>
	</div>
</aside>
