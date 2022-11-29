	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
				aria-current="true"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active"
				aria-current="true"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"
				aria-current="true"></button>

		</div>
		<div class="carousel-inner">
			<div class="carousel-item drk active ">
				<img src="<?= base_url('assets/img/banner/b1.jpg') ?>" height="500px" class="img-carousel d-block w-100">
				<div class="carousel-caption d-md-block">
					<h2 class="fw-bold text-white">Selamat Datang di E-Library SMAN 10 Muaro Jambi</h2>
				</div>
			</div>
			<div class="carousel-item drk">
				<img src="<?= base_url('assets/img/banner/b2.jpg') ?>" height="500px" class="img-carousel d-block w-100">
				<div class="carousel-caption d-md-block">
					<h2 class="fw-bold text-white">Tidak ada Kata Terlambat Untuk Belajar <br> Rajin-rajinlah belajar Demi Masa Depa</h2>
				</div>
			</div>
			<div class="carousel-item drk">
				<img src="<?= base_url('assets/img/banner/b3.jpg') ?>" height="500px" class="img-carousel d-block w-100">
				<div class="carousel-caption d-md-block">
					<h2 class="fw-bold text-white">Membaca Adalah Guru Yang Terbaik <br> Nilai Seseorang Ditentukan Oleh Pengetahuannya</h2>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	<!-- end Carousel -->

	<!-- keuntungan -->
	<!-- <div class="container mt-4 ">
		<div class="text-center mb-4">
			<div class="row">
				<h3 class="fw-bolder text-success ">Selamat Datang di E-Library SMAN 10 Muaro Jambi</h3>
				<p>
					Tidak ada Kata Terlambat Untuk Belajar <br> Rajin-rajinlah belajar Demi Masa Depan <br>
					Membaca Adalah Guru Yang Terbaik <br> Nilai Seseorang Ditentukan Oleh Pengetahuannya
				</p>
			</div>
		</div>
	</div> -->
	<!-- end Keuntungan -->

	<div class="bg-secondary ">
		<form action="<?= base_url('buku/cari') ?>" method="post">
					<div class="col-md-8 mx-auto p-4">
						<div class="search m-4">
							<input type="text" name="search" class="form-control" placeholder="Pencarian Buku">
							<button class="btn btn-primary "><i class="fa fa-search"></i></button>
						</div>
					</div>
			<img src="<?= base_url('assets/img/icon/') ?>wavesNegative.svg" alt="" class="">
		</form>
	</div>

	<!-- Buku -->
	<div class="container mt-n6">
		<div class="text-center mb-4">
			<div class="row text-center">
				<h4 class="fw-bold text-dark">KOLEKSI</h4>
				<p>Beberapa koleksi perpustakaan kami</p>
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

	<div class="container mt-5">
		<div class="mb-4">
			<div class="row ">
				<h4 class="fw-bold text-dark">KOLEKSI TERBARU</h4>
				<p>Koleksi terbaru perpustakaan kami</p>
			</div>
			<div class="row">
				<?php foreach($koleksi_terbaru as $b) : ?>
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

	<div class="container mt-5">
		<div class="mb-4">
			<div class="row">
				<h4 class="fw-bold text-dark">KOLEKSI POPULER</h4>
				<p>Koleksi populer yang sering dipinjam di perpustakaan kami</p>
			</div>
			<div class="row">
				<?php foreach($koleksi_populer as $b) : ?>
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

	<?php foreach($koleksi_kategori as $key => $value) : ?>
	<div class="container mt-5">
		<div class="mb-4">
			<div class="row">
				<h4 class="fw-bold text-dark">KOLEKSI <?= strtoupper($key) ?></h4>
				<p>Koleksi <?= ucfirst($key) ?> di perpustakaan kami</p>
			</div>
			<div class="row">
				<?php foreach($value as $b) : ?>
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
	<?php endforeach ?>
	
	<!-- end Buku -->
	
	<!-- galeri -->
	<div class="bg-secondary">
		<img src="<?= base_url('assets/img/icon/') ?>wavesNegative1.svg" alt="" class="">
		<div class="p-4 mt-n7" id="galeri">
			<div class="row text-center">
				<h4 class="fw-bold text-light">Galeri</h4>
				<p class="text-light">Galeri perpustakaan kami</p>
			</div>
			<div class=" p-4 row mt-4">
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/1.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/2.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/3.jpg') ?>" class="img-fluid card-img-top rounded " style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/4.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/5.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/6.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/7.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-sm-6">
					<div class="card mb-2">
						<div class="text-center">
							<img src="<?= base_url('assets/img/galeri/8.jpg') ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end galeri -->

	<!-- Lokasi -->
	<div class="bg-light mb-4" id="lokasi">
		<div class="container p-4">
			<div class="row text-center">
				<h4 class="fw-bold text-dark">Lokasi</h4>
			</div>
			<div class="row mt-4">
				<div class="col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.1176078230324!2d103.66891131432729!3d-1.672984636641056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258451d7b8b3c9%3A0x2e40955186982cf5!2sSMAN%2010%20Kab.%20Muaro!5e0!3m2!1sen!2sid!4v1667633396080!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col-md-4">
					<div class="row">
						<h5 class="fw-bolder">Alamat</h5>
						<p>Jl. Lintas Sumatra Jl. Petaling No.RT 14, Kb. IX, Kec. Sungai Gelam, Kabupaten Muaro Jambi, Jambi 36364
						</p>
					</div>
					<div class="row">
						<h5 class="fw-bolder">Jam Buka</h5>
						<table class="table">
							<tr>
								<td>Senin - Sabtu</td>
								<td>09.00 - 17.00</td>
							</tr>
							<!-- <tr>
								<td>Selasa</td>
								<td>09.00 - 17.00</td>
							</tr>
							<tr>
								<td>Rabu</td>
								<td>09.00 - 17.00</td>
							</tr>
							<tr>
								<td>Kamis</td>
								<td>09.00 - 17.00</td>
							</tr>
							<tr>
								<td>Jumat</td>
								<td>09.00 - 17.00</td>
							</tr>
							<tr>
								<td>Sabtu</td>
								<td>09.00 - 17.00</td>
							</tr> -->
							<tr>
								<td>Minggu</td>
								<td>Tutup</td>
							</tr>
						</table>
					</div>
					<div class="row">
						<h5 class="fw-bolder">Kontak</h5>
						<p>+62809219029</p>
						<div class="row">
							<div class="col">
								<a href="https://api.whatsapp.com/send?phone=+62809219029&text=...."
									target="_blank" class="text-light btn btn-success"><i class="fa fa-whatsapp"></i> WhatsApp</a> <a
									href="tel: +62809219029" class="text-light btn btn-dark"><i class="fa fa-phone"></i>
									Telepon</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
