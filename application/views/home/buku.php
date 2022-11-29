<!-- Buku -->
<div class="bg-light p-4" id="buku">
	<div class="container">
    <div class="row text-center">
      <form action="<?= base_url('buku/cari') ?>" method="post">
        <div class="container">
          <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
              <div class="search">
                <input type="text" name="search" value="<?= $search ?? '' ?>" class="form-control" placeholder="Pencarian Buku">
                <button class="btn "><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
      </form>
		</div>
		<div class="row text-center mt-4">
			<h4 class="fw-bold text-dark"><?= $search ?? 'Buku' ?></h4>
		</div>
		<div class="row mt-4">
      <?php if(count($buku) > 0) : ?>
			<?php foreach($buku as $b) : ?>
			<div class="col-12 col-md-3 col-sm-6 mt-2">
				<div class="card">
					<div class="text-center">
						<img src="<?= base_url('assets/buku/cover/').$b->cover ?>" style="min-height:300px; max-height:300px; object-fit:contain"
							class="card-img-top img-thumbnail">
					</div>
					<div class="card-body text-center">
						<p class="card-text fw-bold  text-truncate"><a href="<?= base_url('buku/detail/').$b->kd_buku ?>" class="text-decoration-none text-dark"><?= $b->judul_buku ?></a></p>
						<p class="card-text text-xxs text-secondary fw-bold"><?= $b->pengarang ?></p>
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
<!-- end buku-->
