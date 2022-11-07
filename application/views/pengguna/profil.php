<div class="container px-2 px-md-4">
	<div class="page-header min-height-300 border-radius-xl mt-4"
		style="background-image: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
		<span class="mask <?= (is_admin()) ? 'bg-gradient-success' : 'bg-gradient-success' ?>  opacity-3"></span>
	</div>
	<div class="card card-body mx-3 mx-md-4 mt-n6">
		<div class="row gx-4 mb-2">
			<div class="col-auto">
				<div class="avatar avatar-xl position-relative">
				<?php if($user->foto == ''): ?>
					<i class="material-icons text-lg position-relative text-primary">person</i>
				<?php else : ?>
					<img src="<?= base_url('/assets/img/profil/').$user->foto ?>" alt="profile_image"
					class="w-100 border-radius-lg shadow-sm">
				<?php endif ?>
				</div>
			</div>
			<div class="col-auto my-auto">
				<div class="h-100">
					<h5 class="mb-1">
						<?= $user->nama ?>
					</h5>
					<p class="mb-0 font-weight-normal text-sm">
						<?= $user->role ?>
					</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
				<div class="row mb-2">
					<a class="mb-0 px-0 py-1 active btn" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
						<i class="material-icons text-lg position-relative">person</i>
						<span class="ms-1">Profil</span>
					</a>
				</div>
				<div class="row mb-2">
					<button class="mb-0 px-0 py-1 btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditProfil">
						<i class="material-icons text-lg position-relative">edit</i>
						<span class="ms-1">Ubah Profil</span>
					</button>
				</div>
				<div class="row mb-2">
					<button class="mb-0 px-0 py-1 btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEditPassword">
						<i class="material-icons text-lg position-relative">lock</i>
						<span class="ms-1">Ganti Password</span>
					</button>
				</div>
				<div class="row mb-2">
				<?= $this->session->flashdata('msg') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="row">
				<div class="col-12 col-xl-4">
					<div class="card card-plain h-100">
						<div class="card-header pb-0 p-3">
							<div class="row">
								<div class="col-md-8 d-flex align-items-center">
									<h6 class="mb-0">Informasi Profil</h6>
								</div>
							</div>
						</div>
						<div class="card-body p-3">
							<hr class="horizontal gray-light my-4">
							<ul class="list-group">
								<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username :</strong>
									&nbsp; <?= $user->username ?></li>
								<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama:</strong> &nbsp;
									<?= $user->nama ?></li>
								<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telepon:</strong>
									&nbsp; <?= $user->no_telp ?></li>
								<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;
									<?= $user->email ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4 mb-4">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="peminjaman-tab" data-bs-toggle="tab" data-bs-target="#peminjaman" type="button" role="tab" aria-controls="peminjaman" aria-selected="true">Peminjaman</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="pengembalian-tab" data-bs-toggle="tab" data-bs-target="#pengembalian" type="button" role="tab" aria-controls="pengembalian" aria-selected="false">Pengembalian</button>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman-tab">
						<table class="table align-items-center mb-0" id="datatable1">
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
										Status</th>
									<th
										class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
										Denda</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($peminjaman as $row) : ?>
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
										<p class="text-xs text-secondary mb-0"><?= $row->status ?></p>
									</td>
									<td>
										<?php 
										$denda = $this->db->query("SELECT * FROM denda WHERE no_pinjam = '$row->no_pinjam'");
										$total_denda = $denda->row();
											if($row->status == 'Di Kembalikan')
											{
												echo $this->transaksi_m->rp($total_denda->denda);
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
										<a href="<?= base_url(is_admin() ? 'admin/transaksi/detail_pinjam/' : 'pengguna/detail_pinjam/').$row->no_pinjam ?>"
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
					<div class="tab-pane fade" id="pengembalian" role="tabpanel" aria-labelledby="pengembalian-tab">
						<table class="table align-items-center mb-0" id="datatable2">
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
										<a href="<?= base_url(is_admin() ? 'admin/transaksi/detail_pinjam/' : 'pengguna/detail_pinjam/').$row->no_pinjam ?>"
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

<!-- Modal edit Profil -->
<div class="modal fade" id="modalEditProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md">
		<div class="modal-content">
			<form action="<?= (is_admin()) ? base_url('admin/pengguna/update_profil') : base_url('pengguna/update_profil') ?> " method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $user->id_user ?>">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 <?= is_admin() ? 'bg-gradient-primary' : 'bg-gradient-success' ?> shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Edit Profil</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row my-3">
						<label class="form-label">Foto</label>
						<div class="input-group input-group-outline">
							<input class="form-control" type="file" name="foto">
						</div>
					</div>
					<div class="row my-3">
						<div class="col">
							<label class="form-label">Nama</label>
							<div class="input-group input-group-outline">
								<input type="text" name="nama" value="<?= $user->nama ?>" maxlength="50" class="form-control" required>
							</div>
						</div>
						<div class="col">
							<label class="form-label">Username</label>
							<div class="input-group input-group-outline">
								<input type="text" name="username" value="<?= $user->username ?>" maxlength="20" class="form-control"
									required>
							</div>
						</div>
					</div>
					<hr>
					<div class="row my-3">
						<div class="col">
							<label>Email</label>
							<div class="input-group input-group-outline">
								<input type="email" name="email" value="<?= $user->email ?>" required class="form-control">
							</div>
						</div>
						<div class="col">
							<label class="form-label">No Telp</label>
							<div class="input-group input-group-outline">
								<input type="text" maxlength="13" value="<?= $user->no_telp ?>" name="no_telp" class="form-control"
									required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn <?= is_admin() ? 'btn-primary' : 'btn-success' ?>">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal edit password -->
<div class="modal fade" id="modalEditPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<form action="<?= (is_admin()) ? base_url('admin/pengguna/update_password') : base_url('pengguna/update_password') ?>" method="post">
				<input type="hidden" name="id" value="<?= $user->id_user ?>">
				<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div
						class="w-100 <?= is_admin() ? 'bg-gradient-primary' : 'bg-gradient-success' ?> shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
						<h6 class="modal-title text-white text-capitalize ps-3">Edit Password</h6>
						<button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				</div>
				<div class="modal-body">
					<div class="row my-3">
						<label class="form-label">Password lama</label>
						<div class="input-group input-group-outline">
							<input type="password" name="password_lama" class="form-control" required>
						</div>
					</div>
					<div class="row my-3">
						<label class="form-label">Password</label>
						<div class="input-group input-group-outline">
							<input type="password" name="password_baru" class="form-control" required>
						</div>
					</div>
					<div class="row my-3">
						<label class="form-label">Konfirmasi Password</label>
						<div class="input-group input-group-outline">
							<input type="password" name="konfirmasi_password" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn <?= is_admin() ? 'btn-primary' : 'btn-success' ?>">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#datatable1').DataTable({
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
		$('#datatable2').DataTable({
			language: {
				"paginate": {
					"first":      "&laquo",
					"last":       "&raquo",
					"next":       "&gt",
					"previous":   "&lt"
				},
			},
			dom:' <"d-flex"l<"input-group input-group-outline justify-content-end me-4"f>>rt<"d-flex justify-content-between "ip><"clear">'
		});
	} );
</script>