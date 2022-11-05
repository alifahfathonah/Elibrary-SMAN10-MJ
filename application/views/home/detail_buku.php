<div class="container p-4 mt-5" id="buku">
	<div class="row mb-3">
		<div class="col-lg-6">
			<div class="row">
				<!-- <img class="img-fluid rounded img-thumbnail" src="<?= base_url('assets/buku/cover/').$buku->cover ?>"> -->
			</div>
			<div class="row">
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
				</ul>
			</div>
		</div>
	</div>
</div>