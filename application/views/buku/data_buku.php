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
						<h6 class="text-white text-capitalize ps-3">Data Buku</h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<div class="text-end me-3">
						<button type="button" class="btn btn-secondary" data-bs-toggle="modal"
							data-bs-target="#modalTambah">
							<i class="material-icons opacity-10" translate="no">add</i> Tambah Buku
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
										Cover
										</th>
									<th class="w-25 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Judul Buku
										</th>
									<th
										class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										Pengarang</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Tahun Terbit</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Penerbit</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										File</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($buku as $row) : ?>
								<tr>
									<td class="align-middle text-center">
										<span
											class="text-secondary text-xs font-weight-bold"><?= $no++ ?></span>
									</td>
									<td>
										<img src="<?= base_url('assets/buku/cover/'.$row->cover) ?>" alt="" class="avatar">
									</td>
									<td>
										<p class="text-xs font-weight-bold mb-0 w-25 "><?=$row->judul_buku ?>
										</p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->pengarang ?></p>
									</td>
									<td class="align-middle text-center">
										<p class="text-xs text-secondary mb-0"><?= $row->tahun_terbit ?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->penerbit ?></p>
									</td>
									<td class="align-middle text-center">
										<p class="text-xs text-secondary mb-0"><a href="<?= base_url('assets/buku/file/'.$row->file) ?>">File</a></p>
									</td>
									<td class="align-middle">
										<a href="#"
											class="text-secondary text-warning font-weight-bold text-xs"
											data-bs-toggle="modal"
											data-bs-target="#modalEdit"
											data-kd_buku="<?= $row->kd_buku ?>"
											data-id_kategori="<?= $row->id_kategori ?>"
											data-pengarang="<?= $row->pengarang ?>"
											data-judul_buku="<?= $row->judul_buku ?>"
											data-tahun_terbit="<?= $row->tahun_terbit ?>"
											data-penerbit="<?= $row->penerbit ?>"
											data-isbn="<?= $row->isbn ?>"
											data-jumlah_buku="<?= $row->jumlah_buku ?>"
											data-cover="<?= $row->cover ?>"
											data-file="<?= $row->file ?>"
											>
											<i class="material-icons opacity-10" translate="no">edit
											</i>
										</a> 
										|
										<a href="<?= base_url('admin/data/detailbuku/').$row->kd_buku ?>"
											class="text-secondary text-success font-weight-bold text-xs">
											<i class="material-icons opacity-10" translate="no">visibility
											</i>
										</a> 
										|
										<a href="<?= base_url('admin/data/buku_hapus/').$row->kd_buku ?>"
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
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<form action="<?= base_url('admin/data/buku_proses') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Tambah Buku</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<label class="form-label">Kode Buku</label>
							<div class="input-group input-group-outline">
								<input type="text" name="kd_buku" class="form-control" value="<?= $kd_buku ?>" readonly required>
							</div>
						</div>
						<div class="col-md-4">
							<label class="form-label">Kategori</label>
							<div class="input-group input-group-outline">
								<select class="form-control" name="id_kategori" required>
									<option value="">Pilih Kategori</option>
									<?php foreach($kategori as $k): ?>
									<option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label>Pengarang</label>
							<div class="input-group input-group-outline">
								<input type="text" name="pengarang" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-8">
							<label>Judul Buku</label>
							<div class="input-group input-group-outline">
								<input type="text" name="judul_buku" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<label>Tahun Terbit</label>
							<div class="input-group input-group-outline">
								<input type="number" min="1980" max="<?= date('Y') ?>" name="tahun_terbit" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-5">
							<label>Penerbit</label>
							<div class="input-group input-group-outline">
								<input type="text" name="penerbit" required class="form-control">
							</div>
						</div>
						<div class="col-md-5">
							<label>ISBN</label>
							<div class="input-group input-group-outline">
								<input type="text" name="isbn" required class="form-control">
							</div>
						</div>
						<div class="col-md-2">
							<label>Jumlah Buku</label>
							<div class="input-group input-group-outline">
								<input type="number" min="1" name="jumlah_buku" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-4">
							<img width="100px" src="https://w7.pngwing.com/pngs/867/249/png-transparent-book-thick-isolated-pink-peach-blank-closed-shut-cover-hardcover-thumbnail.png"  alt="">
							<label>Cover <span class="text-danger">*(JPG | PNG | JPEG)</span></label>
							<div class="input-group input-group-outline">
								<input type="file" name="cover" required class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<img width="100px" src="https://w7.pngwing.com/pngs/138/818/png-transparent-computer-icons-book-computer-program-open-book-purple-angle-violet-thumbnail.png" alt="">
							<label>File Lampiran <span class="text-danger">*(PDF < 4MB)</span></label>
							<div class="input-group input-group-outline">
								<input type="file" name="file" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						
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
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<form action="<?= base_url('admin/data/buku_proses') ?>" method="post" enctype="multipart/form-data">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Edit Buku</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<label class="form-label">Kode Buku</label>
							<div class="input-group input-group-outline">
								<input type="text" name="kd_buku" id="kd_buku" class="form-control" readonly required>
							</div>
						</div>
						<div class="col-md-4">
							<label class="form-label">Kategori</label>
							<div class="input-group input-group-outline">
								<select class="form-control" name="id_kategori" id="id_kategori" required>
									<option value="">Pilih Kategori</option>
									<?php foreach($kategori as $k): ?>
									<option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<label>Pengarang</label>
							<div class="input-group input-group-outline">
								<input type="text" name="pengarang" id="pengarang" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-8">
							<label>Judul Buku</label>
							<div class="input-group input-group-outline">
								<input type="text" name="judul_buku" id="judul_buku" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<label>Tahun Terbit</label>
							<div class="input-group input-group-outline">
								<input type="number" min="1980" max="<?= date('Y') ?>"  name="tahun_terbit" id="tahun_terbit" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-5">
							<label>Penerbit</label>
							<div class="input-group input-group-outline">
								<input type="text" name="penerbit" id="penerbit" required class="form-control">
							</div>
						</div>
						<div class="col-md-5">
							<label>ISBN</label>
							<div class="input-group input-group-outline">
								<input type="text" name="isbn" id="isbn" required class="form-control">
							</div>
						</div>
						<div class="col-md-2">
							<label>Jumlah Buku</label>
							<div class="input-group input-group-outline">
								<input type="number" min="1" name="jumlah_buku" id="jumlah_buku" required class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						<div class="col-md-4">
							<img width="100px" src="https://w7.pngwing.com/pngs/867/249/png-transparent-book-thick-isolated-pink-peach-blank-closed-shut-cover-hardcover-thumbnail.png"  alt="">
							<label>Cover <span class="text-danger">*(JPG | PNG | JPEG)</span></label>
							<div class="input-group input-group-outline">
								<input type="hidden" name="coverlama" id="coverlama" required class="form-control">
								<input type="file" name="cover" id="cover" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<img width="100px" src="https://w7.pngwing.com/pngs/138/818/png-transparent-computer-icons-book-computer-program-open-book-purple-angle-violet-thumbnail.png" alt="">
							<label>File Lampiran <span class="text-danger">*(PDF < 4MB)</span></label>
							<div class="input-group input-group-outline">
								<input type="hidden" name="filelama" id="filelama" required class="form-control">
								<input type="file" name="file" id="file" class="form-control">
							</div>
						</div>
					</div>
					<div class="row my-3">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="update" class="btn btn-primary">Simpan</button>
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
        var kd_buku         = button.data('kd_buku')
				var id_kategori     = button.data('id_kategori')
				var pengarang       = button.data('pengarang')
				var judul_buku      = button.data('judul_buku')
				var tahun_terbit    = button.data('tahun_terbit')
				var penerbit        = button.data('penerbit')
				var isbn         		= button.data('isbn')
				var jumlah_buku     = button.data('jumlah_buku')
				var cover         	= button.data('cover')
				var file        		= button.data('file')
				console.log(button.data())
		
        var modal = $(this)

        //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
        modal.find('#kd_buku').val(id_kategori)
        modal.find('#id_kategori').val(id_kategori)
        modal.find('#pengarang').val(pengarang)
        modal.find('#judul_buku').val(judul_buku)
        modal.find('#tahun_terbit').val(tahun_terbit)
        modal.find('#penerbit').val(penerbit)
        modal.find('#isbn').val(isbn)
        modal.find('#jumlah_buku').val(jumlah_buku)
        modal.find('#coverlama').val(cover)
        modal.find('#filelama').val(file)

    });

	} );
</script>