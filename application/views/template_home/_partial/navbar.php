<nav id="navbarscrl" class="navbar navbar-expand-lg sticky-top navbar-dark bg-success">
	<div class="container">
		<a class="navbar-brand fw-bold" href="<?= base_url() ?>">E-Library</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav mx-auto">
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == '' ) echo 'active' ?>"" href="<?= base_url() ?>">Home</a>
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == '#galeri' ) echo 'active' ?>"" href="<?= base_url() ?>#galeri">Galeri</a>
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == '#lokasi' ) echo 'active' ?>"" href="<?= base_url() ?>#lokasi">Lokasi</a>
				<a class="nav-link fw-bold <?php if($this->uri->segment(1) == 'buku' ) echo 'active' ?>" href="<?= base_url('buku') ?>">E-Library</a>
			</div>
		</div>
	</div>
</nav>
