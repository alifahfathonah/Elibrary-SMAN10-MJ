<!-- layanan -->
<div class="bg-light p-4" id="layanan">
	<div class="container">
    <div class="row text-center">
      <form action="<?= base_url('buku') ?>" method="get">
        <div class="container">
          <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
              <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" name="search" value="<?= $_GET['search'] ?? "" ?>" class="form-control" placeholder="Pencarian Buku">
                <button class="btn btn-primary">Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>
		</div>
		<div class="row text-center mt-4">
			<h4 class="fw-bold text-success">Buku <?= $_GET['search'] ?? "" ?></h4>
		</div>
		<div class="row mt-4">
      <?php if(count($buku) > 0) : ?>
			<?php foreach($buku as $b) : ?>
			<div class="col-6 col-md-3 col-sm-6 mt-2">
				<div class="card">
					<div class="text-center">
						<img src="<?= base_url('assets/buku/cover/').$b->cover ?>" height="200px"
							class="card-img-top img-thumbnail w-100">
					</div>
					<div class="card-body text-center">
						<!-- <p class="card-text text-secondary fw-bold"><?= $b->pengarang ?></p> -->
						<p class="card-text text-primary fw-bold"><a href="<?= base_url('buku/detail/').$b->kd_buku ?>" class="text-decoration-none"><?= $b->judul_buku ?></a></p>
					</div>
				</div>
			</div>
			<?php endforeach ?>
      <?php else : ?>
      <!-- <div class="col-6 col-md-3 col-sm-6 mt-2"> -->
				<div class="card">
					<!-- <div class="text-center">
						<img src="<?= base_url('assets/buku/cover/').$b->cover ?>" height="200px"
							class="card-img-top img-thumbnail w-100">
					</div> -->
					<div class="card-body text-center">
						<p class="card-text text-danger fw-bold">Data tidak ditemukan</p>
					</div>
				</div>
			<!-- </div> -->
      <?php endif ?>
		</div>
	</div>
</div>
<!-- end layanan -->
