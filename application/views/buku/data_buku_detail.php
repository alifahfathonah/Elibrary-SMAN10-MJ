<div class="container p-4 mt-5" id="buku">
	<div class="row mb-3">
		<div class="col-lg-6">
			<div class="row">
				<img class="img-fluid rounded img-thumbnail" src="<?= base_url('assets/buku/cover/').$buku->cover ?>">
			</div>
			<div class="row container-fluid">
				<embed src="<?= base_url('assets/buku/file/'.$buku->file) ?>#view=FitV"  height="500px"></emded>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4><?= $buku->judul_buku ?></h4>
				</div>
				<ul class="list-group list-groud-flush">
          <li class="list-group-item">
						<p>Kode Buku : <span class="text-bold"><?= $buku->kd_buku ?><span></p>
					</li>
					<li class="list-group-item">
						<p>Pengarang : <span class="text-bold"><?= $buku->pengarang ?><span></p>
					</li>
					<li class="list-group-item">
						<p>Tahun Terbit : <span class="text-bold"><?= $buku->tahun_terbit ?><span></p>
					</li>
					<li class="list-group-item">
						<p>Penerbit : <span class="text-bold"><?= $buku->penerbit ?><span></p>
					</li>
          <li class="list-group-item">
						<p>ISBN : <span class="text-bold"><?= $buku->isbn ?><span></p>
					</li>
          <li class="list-group-item">
						<p>Kategori : <span class="text-bold"><?= $buku->nama_kategori ?><span></p>
					</li>
          <li class="list-group-item">
						<p>Jumlah Buku : <span class="text-bold"><?= $buku->jumlah_buku ?><span></p>
					</li>
          <li class="list-group-item">
						<p>File : <a class="text-bold" href="<?= base_url('assets/buku/file/'.$buku->file) ?>"><?= $buku->file ?></a><span></p>
					</li>
          
					<li class="list-group-item">
						<!-- <form action="<?= base_url('buku/sewa') ?>" method="post">
							<input type="hidden" name="id_buku" value="<?= $buku->id_buku ?>">
							<input type="hidden" name="harga" value="<?= $buku->harga ?>">
							<input type="hidden" name="nama" value="<?= $buku->nama_buku ?>">
							<div class="text-"> -->
									<!-- <div class="col-sm-6 text-">
										Jumlah yang akan disewa
									</div>
									<div class="col-sm-5 mb-4">
										<input type="number" min="1" max="<?= $buku->stok_buku ?>"
											class="form-control text-center" value="1" name="qty">
									</div> -->
									
								<!-- <div class="col-sm-6 text-">
									Tanggal sewa
								</div>
								<div class="col-sm-5 mb-4">
									<div class="input-group input-group-outline">
										<input type="text" class="form-control text-center" name="tanggal" id="tanggal">
									</div>
								</div> -->
								<!-- <button type="submit" class="btn btn-primary">Sewa</button>
							</div>
						</form> -->
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>