<div class="container p-4 mt-5" id="buku">

	<a href="javascript:history.back()" class="btn btn-danger">Kembali</a>

	<div class="row mb-3">
		<div class="col-md-4">
			<img src="<?= base_url('assets/buku/cover/').$buku->cover ?>" class="img-fluid rounded-start" alt="Cover">
		</div>
		<div class="col-md-8">
			<div class="row">
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
					<p>File PDF</p>
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
	</div>
	<?php if(check_user_login()): ?>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="row container-fluid">
				<embed src="<?= base_url('assets/buku/file/'.$buku->file) ?>#view=FitV"  height="560px"></emded>
			</div>
		</div>
	</div>
	<?php endif ?>

</div>