<div class="container-fluid py-4">
	<div class="row justify-content-end">
		<div class="col-6">
			<?= $this->session->flashdata('msg'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">

			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3">Data Denda</h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="text-end me-3">
						<button type="button" class="btn btn-secondary" data-bs-toggle="modal"
							data-bs-target="#modalTambah">
							<i class="material-icons opacity-10" translate="no">add</i> Tambah Denda
						</button>
					</div>
					<div class="table-responsive p-4 mx-2">
						<table class="table align-items-center mb-0" id="datatable">
							<thead>
								<tr>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										No</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Harga Denda
										</th>
									<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
										Status
										</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Mulai Tanggal
										</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($denda as $row) : ?>
								<tr>
									<td class="align-middle text-center">
										<span
											class="text-secondary text-xs font-weight-bold"><?= $no++ ?></span>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->harga_denda ?></p>
									</td>
									<td class="align-middle text-center">
										<span title="Aktifkan/non aktifkan"
											class="badge badge-sm <?= ($row->stat == 'Aktif') ? 'bg-gradient-success' : 'bg-gradient-secondary' ?>">
											<a href="<?= base_url('admin/data/denda_active/').$row->id_biaya_denda ?>"
												class="text-white">
												<?= $row->stat ?>
											</a>
										</span>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->tgl_tetap ?></p>
									</td>
									<td class="align-middle">
										<a href="#"
											class="text-secondary text-warning font-weight-bold text-xs" data-bs-toggle="modal"
											data-bs-target="#modalEdit" 
											data-id_biaya_denda="<?= $row->id_biaya_denda ?>" 
											data-harga_denda="<?= $row->harga_denda ?>" 
											>
											<i class="material-icons opacity-10" translate="no">edit
											</i>
										</a> 
										|
										<a href="<?= base_url('admin/data/denda_hapus/').$row->id_biaya_denda ?>"
											onclick="return confirm('Hapus ?')"
											class="text-secondary text-danger font-weight-bold text-xs">
											<i class="material-icons opacity-10" translate="no">delete
											</i>
										</a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Simpan -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<form action="<?= base_url('admin/data/denda_proses') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Tambah Denda</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<label class="form-label">Biaya Denda</label>
						<div class="input-group input-group-outline">
							<input type="number" name="harga_denda" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<form action="<?= base_url('admin/data/denda_proses') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Edit Denda</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<label class="form-label">Biaya Denda</label>
						<div class="input-group input-group-outline">
							<input type="hidden" id="id_biaya_denda" name="id_biaya_denda" class="form-control" required>
							<input type="number" id="harga_denda" name="harga_denda" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="update" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#datatable').DataTable({
			language: {
				"paginate": {
					"first":      "&laquo",
					"last":       "&raquo",
					"next":       "&gt",
					"previous":   "&lt"
				},
			},
			dom:' <"d-flex"l<"input-group input-group-outline justify-content-end me-4"f>>rt<"d-flex justify-content-between"ip><"clear">'
		});

		$('#modalEdit').on('show.bs.modal', function (event) {
        // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
        var button              = $(event.relatedTarget)

        // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
        var id_biaya_denda         = button.data('id_biaya_denda')
				var harga_denda         = button.data('harga_denda')
		
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#id_biaya_denda').val(id_biaya_denda)
        modal.find('#harga_denda').val(harga_denda)
    });

	} );
</script>