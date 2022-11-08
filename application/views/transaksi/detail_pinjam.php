<div class="container-fluid py-4">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="card my-4">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="<?= is_admin() ? 'bg-gradient-primary' : 'bg-gradient-success' ?> shadow-primary border-radius-lg pt-4 pb-3">
							<h6 class="text-white text-capitalize ps-3">Pinjam</h6>
						</div>
					</div>
					<div class="card-body px-4 pb-2">
						<div class=" mx-auto col-md-12 col-sm-12">
							<label for="">No Pinjam</label>
							<input type="text" name="no_pinjam" class="form-control" value="<?= $peminjaman->no_pinjam;?>" disabled>
							
							<label for="">Tanggal Pinjam</label>
							<input type="text" name="tgl_pinjam" class="form-control" id="" value="<?= $peminjaman->tgl_pinjam;?>" disabled>

							<label for="">Tanggal Pengembalian</label>
							<input type="text" class="form-control" autocomplete="off" disabled type="text" value="<?= $peminjaman->tgl_balik;?>">

							<label for="">Peminjam</label>
							<div class="input-group input-group-outline">
								<div class="form-control">
									<table class="table">
										<tr>
											<td>ID Peminjam</td>
											<td>:</td>
											<td><?= $peminjaman->id_user ?></td>
										</tr>
										<tr>
											<td>Nama Anggota</td>
											<td>:</td>
											<td><?= $peminjaman->nama ?></td>
										</tr>
										<tr>
											<td>Telepon</td>
											<td>:</td>
											<td><?= $peminjaman->no_telp ?></td>
										</tr>
										<tr>
											<td>E-mail</td>
											<td>:</td>
											<td><?= $peminjaman->email ?></td>
										</tr>
										<tr>
											<td>Level</td>
											<td>:</td>
											<td><?= $peminjaman->role ?></td>
										</tr>
									</table>
								</div>
							</div>
							<label for="">Lama Pinjam</label>
							<input type="text" class="form-control" autocomplete="off" disabled type="text" value="<?= $peminjaman->lama_pinjam;?> Hari">
							<hr>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6">
				<div class="card my-4">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="<?= is_admin() ? 'bg-gradient-primary' : 'bg-gradient-success' ?> shadow-primary border-radius-lg pt-4 pb-3">
							<h6 class="text-white text-capitalize ps-3">Buku</h6>
						</div>
					</div>
					<div class="card-body px-4 pb-2">
						<div class=" mx-auto col-md-12 col-sm-12">
							<label for="">Status</label>
							<input type="text" class="form-control" autocomplete="off" disabled type="text" value="<?= $peminjaman->status ?>" >
							<label for="">Tanggal Kembali</label>
							<input type="text" class="form-control <?= ($peminjaman->tgl_kembali == '0') ? 'text-danger' : '' ?>" autocomplete="off" disabled type="text" value="<?= ($peminjaman->tgl_kembali != '0') ? $peminjaman->tgl_kembali : 'Belum Dikembalikan' ?> " >
							<label for="">Denda</label>
							<div class="input-group input-group-outline">
								
								<div class="form-control">
									<?php 
										$denda = $this->db->query("SELECT * FROM denda WHERE no_pinjam = '$peminjaman->no_pinjam'");
										$total_denda = $denda->row();
										if($peminjaman->status == 'Di Kembalikan')
										{
											echo '<p class="text-xs text-secondary mb-0">'.$this->transaksi_m->rp($total_denda->denda).'</p>';
										}else{
											$jml = $this->db->query("SELECT * FROM peminjaman WHERE no_pinjam = '$peminjaman->no_pinjam'")->num_rows();			
											$date1 = date('Ymd');
											$date2 = preg_replace('/[^0-9]/','',$peminjaman->tgl_balik);
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
								</div>
							</div>
							<label for="">Data Buku</label>
							<div class="input-group input-group-outline">
								<div class="form-control">
									<table class="table">
										<thead>
											<tr>
												<th>No</th>
												<th>Title</th>
												<th>Penerbit</th>
												<th>Tahun</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$no=1;
											foreach($buku as $b) :
										?>
											<tr>
												<td><?= $no++;?></td>
												<td><?= $b->judul_buku;?></td>
												<td><?= $b->penerbit;?></td>
												<td><?= $b->tahun_terbit;?></td>
											</tr>
										<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>

							<hr>
							<?php if($peminjaman->status == 'Dipinjam' && is_admin()) : ?>
								<button name="kembalikan" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalDenda" >Kembalikan Buku</button>
								
								<?php 
									$data = [
										'peminjaman' => $peminjaman,
										'buku' => $buku
									];
									$this->view('transaksi/modal_denda', $data) 
								?>
							<?php endif ?>
							<a href="javascript:history.back()" class="btn btn-danger">Kembali</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	
</div>
