<div class="container p-4 mt-5" id="buku">

	
	<div class="row mb-4">
		<div class="col-md-3">
			<a href="javascript:history.back()" class="btn btn-danger">
				<i class="fa fa-arrow-left"></i>
				Kembali
			</a>
		</div>
		<div class="col-md-9">
			<?php if($this->uri->segment('1') == 'buku') : ?>
			<form action="<?= base_url('buku/cari') ?>" method="post">
				<div class="search">
					<input type="text" name="search" class="form-control text-center" placeholder="Pencarian Buku">
					<button class="btn "><i class="fa fa-search"></i></button>
				</div>
			</form>
			<?php endif ?>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-md-4">
			<img src="<?= base_url('assets/buku/cover/').$buku->cover ?>" class="img-fluid rounded-start" alt="Cover">
		</div>
		<div class="col-md-8">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" aria-controls="nav-info" aria-selected="true">Informasi Buku</button>
					<button class="nav-link" id="nav-lihat-tab" data-bs-toggle="tab" data-bs-target="#nav-lihat" type="button" role="tab" aria-controls="nav-lihat" aria-selected="false">Lihat Buku</button>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
					<div class="row mt-4">
						<h2><?= $buku->judul_buku ?></h2>
						<h5 class="text-secondary text-sm"><?= $buku->pengarang ?>  ( <?= $buku->tahun_terbit ?> )</h5>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4 col-4">
							<p>Kode Buku</p>
						</div>
						<div class="col-md-8 col-8">
							<p class="font-weight-bolder"><?= $buku->kd_buku ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-4 ">
							<p>Penerbit</p>
						</div>
						<div class="col-md-8 col-8">
							<p class="font-weight-bolder"><?= $buku->penerbit ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-4">
							<p>ISBN</p>
						</div>
						<div class="col-md-8 col-8">
							<p class="font-weight-bolder"><?= $buku->isbn ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-4">
							<p>Kategori</p>
						</div>
						<div class="col-md-8 col-8">
							<p class="font-weight-bolder"><?= $buku->nama_kategori ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-4">
							<p>Jumlah Buku</p>
						</div>
						<div class="col-md-8 col-8">
							<p class="font-weight-bolder"><?= $buku->jumlah_buku ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-4">
							<p>File</p>
						</div>
						<?php if(check_user_login()): ?>
						<div class="col-md-8 col-8">
							<p><a class="btn btn-primary" target="_blank" href="<?= base_url('assets/buku/file/'.$buku->file) ?>">Download</a></p>
						</div>
						<?php else : ?>
							<div class="col-md-8 col-8">
								<p><a class="btn btn-primary" href="<?= base_url('auth/login') ?>">Login</a></p>
							</div>
						<?php endif ?>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-lihat" role="tabpanel" aria-labelledby="nav-lihat-tab">
					<?php if(check_user_login()): ?>
					<div class="row mt-4">
						<div class="col-md-8 mx-auto">
							<div class="row container-fluid bg-dark">
								<embed src="<?= base_url('assets/buku/file/'.$buku->file) ?>#view=FitV"  height="450px"></emded>
							</div>
						</div>
					</div>
					<?php else : ?>
					<div class="col-md-8 col-8 m-5">
						<p><a class="btn btn-primary" href="<?= base_url('auth/login') ?>">Login</a> untuk melihat file</p>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>

	<?php if($this->uri->segment('1') == 'buku') : ?>
	<div class="row mt-5">
		<div class="container">
			<div class="text-center mb-4">
				<div class="row text-center">
					<h4 class="fw-bold text-dark">KOLEKSI LAINNYA</h4>
					<p>Koleksi lainnya perpustakaan kami</p>
				</div>
				<div class="row">
					<?php foreach($koleksi as $b) : ?>
					<div class="col-6 col-md-2 mt-2">
						<div class="card">
							<div class="text-center">
								<img src="<?= base_url('assets/buku/cover/').$b->cover ?>" style="min-height:200px; max-height:200px; object-fit:contain"
									class="card-img-top img-thumbnail">
							</div>
							<div class="card-body text-center">
								<p class="card-text fw-bold text-truncate"><a href="<?= base_url('buku/detail/').$b->kd_buku ?>" class="text-decoration-none text-dark"><?= $b->judul_buku ?></a></p>
								<p class="card-text text-xxs text-secondary fw-bold text-truncate"><?= $b->pengarang ?></p>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>

	<?php endif ?>

</div>


