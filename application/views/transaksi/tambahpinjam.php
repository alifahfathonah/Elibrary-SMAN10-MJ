<div class="container-fluid py-4">
	<div class="row justify-content-end">
		<div class="col-6">
			<?= $this->session->flashdata('msg'); ?>
		</div>
	</div>
	<form action="<?= base_url('') ?>" method="post">
		<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3">Pinjam</h6>
					</div>
				</div>
				<div class="card-body px-4 pb-2">
					<div class=" mx-auto col-md-12 col-sm-12">

						<label for="">No Pinjam</label>
						<div class="input-group input-group-outline">
							<input type="text" name="judul" class="form-control" value="<?//= $info->judul ?>" id="">
						</div>
						<label for="">Tanggal Pinjam</label>
						<div class="input-group input-group-outline">
							<input type="date" name="judul" class="form-control" value="<?//= $info->judul ?>" id="">
						</div>
						<label for="">Id Peminjam</label>
						<div class="input-group input-group-outline">
							<input type="text" name="alamat" value="<?//= $info->alamat ?>" class="form-control">
						</div>
						<label for="">Peminjam</label>
						<div class="input-group input-group-outline">
							<!-- <input placeholder="628xxxxxx" type="text" name="kontak" value="<?//= $info->kontak ?>"
									class="form-control"> -->
						</div>
						<label for="">Lama Pinjam</label>
						<div class="input-group input-group-outline">
							<input placeholder="628xxxxxx" type="text" name="kontak" value="<?//= $info->kontak ?>"
								class="form-control">
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3">Buku</h6>
					</div>
				</div>
				<div class="card-body px-4 pb-2">
					<div class=" mx-auto col-md-12 col-sm-12">
						<label for="">Kd Buku</label>
						<div class="input-group input-group-outline">
							<input type="text" name="judul" class="form-control" value="<?//= $info->judul ?>" id="">
						</div>
						<label for="">Data Buku</label>
						<div class="input-group input-group-outline">
							<input type="date" name="judul" class="form-control" value="<?//= $info->judul ?>" id="">
						</div>

						<hr>
						<button type="reset" class="btn btn-danger">Batal</button>
						<button type="submit" name="simpan" class="btn btn-success">Update</button>

					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
	<div class="row">
		<div class="" id="section"></div>
	</div>
</div>

<script>
	$('.menu-info').on('click', function (e) {
		e.preventDefault;

		$('.menu-info').removeClass('btn-primary').addClass('btn-secondary');
		$(this).removeClass('btn-secondary').addClass('btn-primary');

	});

	$('#banner').on('click', function () {
		requestMenu("<?= base_url('homepage/info_banner') ?>");
	})

	$('#layanan').on('click', function () {
		requestMenu("<?= base_url('homepage/info_layanan') ?>");
	})

	$('#galeri').on('click', function () {
		requestMenu("<?= base_url('homepage/info_galeri') ?>");
	})

	$('#jam_buka').on('click', function () {
		requestMenu("<?= base_url('homepage/info_jam_buka') ?>");
	})

	var requestMenu = (url) => {
		$.ajax({
			url: url,
			method: "POST",
			dataType: "html"
		}).done((html) => {
			$("#section").html(html)
		});
	}

</script>
