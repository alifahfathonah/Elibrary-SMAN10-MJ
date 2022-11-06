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
						<h6 class="text-white text-capitalize ps-3">Pengembalian</h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<!-- <div class="text-end me-3">
						<a href="<?= base_url('admin/transaksi/tambahpinjam') ?>" class="btn btn-secondary">
							<i class="material-icons opacity-10" translate="no">add</i> Tambah Pinjam
						</a>
					</div> -->
					<div class="table-responsive p-4 mx-2">
						<table class="table align-items-center mb-0" id="datatable">
							<thead>
								<tr>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										No</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										No Peminjaman</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Id Peminjam</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Nama Peminjam</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Tanggal Pinjam</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Tanggal Balik
									</th>
									<th
										class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										Tanggal Pengembalian</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Denda</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($pengembalian as $row) : ?>
								<tr>
									<td class="align-middle text-center">
										<span
											class="text-secondary text-xs font-weight-bold"><?= $no++ ?></span>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->no_pinjam ?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->id_user ?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->nama?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->tgl_pinjam ?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->tgl_balik ?></p>
									</td>
									<td>
										<p class="text-xs text-secondary mb-0"><?= $row->tgl_kembali ?></p>
									</td>
									<td>
										<?php 
										$denda = $this->db->query("SELECT * FROM denda WHERE no_pinjam = '$row->no_pinjam'");
										$total_denda = $denda->row();
											if($row->status == 'Di Kembalikan')
											{
												echo '<p class="text-xs text-secondary mb-0">'.$this->transaksi_m->rp($total_denda->denda).'</p>';
											}else{
												$jml = $this->db->query("SELECT * FROM peminjaman WHERE no_pinjam = '$row->no_pinjam'")->num_rows();			
												$date1 = date('Ymd');
												$date2 = preg_replace('/[^0-9]/','',$row->tgl_balik);
												$diff = $date1 - $date2;
												if($diff > 0 )
												{
													echo $diff.' hari';
													$dd = $this->transaksi_m->getBiayaDenda(); 
													echo '<p class="text-xs text-secondary mb-0 text-danger">
													'.$this->transaksi_m->rp($jml*($dd->harga_denda*$diff)).' 
													</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
												}else{
													echo '<p class="text-xs text-secondary mb-0 text-success">
													Tidak Ada Denda</p>';
												}
											}
										?>
									</td>
									
									<td class="align-middle">
										<a href="<?= base_url('admin/transaksi/detail_pinjam/').$row->no_pinjam ?>"
											class="text-secondary text-success font-weight-bold text-xs">
											<i class="material-icons opacity-10" translate="no">visibility
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
			<form action="<?= base_url('transaksi/pemasukan_proses') ?>" method="post">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Pemasukan</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<label class="form-label">Tanggal</label>
						<div class="input-group input-group-outline">
							<input type="date" name="tanggal" class="form-control" required>
						</div>
					</div>
					<div class="row my-3">
						<label>Catatan</label>
						<div class="input-group input-group-outline">
							<textarea name="catatan" id="textarea" class="form-control" cols="10" rows="3"></textarea>
						</div>
					</div>
					<div class="row my-3">
						<label>Jumlah Pemasukan</label>
						<div class="input-group input-group-outline">
							<input type="number" name="jumlah" required class="form-control">
						</div>
					</div>
					<div class="row my-3">
						<div class="input-group input-group-outline">
							<select class="form-control" name="status" required>
								<option value="">Pilih Status</option>
								<option value="selesai">Selesai</option>
								<option value="pending">Pending</option>
							</select>
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
	} );
</script>