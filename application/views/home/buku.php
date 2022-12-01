<!-- Buku -->
<div class="bg-light p-4" id="buku">
	<div class="container">
    <div class="row text-center">
      <form action="<?= base_url('buku/cari') ?>" method="post">
        <div class="container">
          <div class="row height d-flex justify-content-center align-items-center">
            <div class="offset-md-2 col-md-8">
              <div class="search">
                <input type="text" name="search" value="<?= $search ?? '' ?>" class="form-control" placeholder="Pencarian Buku">
                <button class="btn "><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
		</div>
		<div class="row">
			<div class="col-md-3 position-relative">
				<div class="row position-fixed w-20">
					<div class="col-12">
						<div class="card ">
							<form action="<?= base_url('buku/filter') ?>" method="post">
								<div class="container-fluid">
									<div class="row m-4">
										<div class="text-center">
											<h5>Filter Koleksi</h5>
										</div>
									</div>
									<div class="form-group mb-2">
										<label for="filter">Berdasarkan Kategori</label>
										<select name="kategori" id="filter" required class="form-control">
											<option value=""></option>
											<?php foreach($kategori as $k) : ?>
												<option value="<?= $k->nama_kategori ?>" <?= ($k->nama_kategori == $search) ? 'selected' : '' ?> ><?= $k->nama_kategori ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<button name="filter" class="btn btn-success"><i class="fa fa-filter"></i> Filter</button>
									<a href="<?= base_url('buku') ?>" class="btn btn-danger"> <i class="fa fa-close"></i>Clear</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row text-center mt-4">
					<h4 class="fw-bold text-dark"><?= $search ?? 'Koleksi Buku' ?></h4>
				</div>
				<div class="row mt-4">
					<?php if(count($buku) > 0) : ?>
					<?php foreach($buku as $b) : ?>
					<div class="col-6 col-md-3 mt-2">
						<div class="card">
							<div class="text-center">
								<img src="<?= base_url('assets/buku/cover/').$b->cover ?>" style="min-height:200px; max-height:200px; object-fit:contain"
									class="card-img-top img-thumbnail">
							</div>
							<div class="card-body text-center">
								<p class="card-text fw-bold  text-truncate"><a href="<?= base_url('buku/detail/').$b->kd_buku ?>" class="text-decoration-none text-dark"><?= $b->judul_buku ?></a></p>
								<p class="card-text text-xxs text-secondary fw-bold text-truncate"><?= $b->pengarang ?></p>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<?php else : ?>
						<div class="card">
							<div class="card-body text-center">
								<p class="card-text text-danger fw-bold">Data tidak ditemukan</p>
							</div>
						</div>
					<?php endif ?>
				</div>
				<div class="row mt-4">
						<div class="d-flex justify-content-center my-auto ">
						<?= $this->pagination->create_links() ?>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end buku-->
