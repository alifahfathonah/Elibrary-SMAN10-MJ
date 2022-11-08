<div class="container-fluid py-4">
	<form action="<?= base_url('admin/transaksi/pinjam_proses') ?>" method="post">
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
							<input type="text" name="no_pinjam" required class="form-control" value="<?= $no_pinjam;?>" readonly>
						</div>
						<label for="">Tanggal Pinjam</label>
						<div class="input-group input-group-outline">
							<input type="date" name="tgl_pinjam" required class="form-control" id="">
						</div>
						<label for="">Id Peminjam</label>
						<input type="text" class="form-control" autocomplete="off" required name="id_user" id="search-box" readonly type="text" value="">
						<div class="input-group input-group-outline">
							<a data-bs-toggle="modal" data-bs-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
						</div>
						<label for="">Peminjam</label>
						<div class="input-group input-group-outline">
							<div id="result_tunggu"> <p style="color:red">* Silahkan Tambahkan Data</p></div>
							<div id="result"></div>
							
						</div>
						<label for="">Lama Pinjam</label>
						<div class="input-group input-group-outline">
							<input placeholder="Lama Pinjam Contoh : 2 Hari (2)" type="number" required name="lama_pinjam"
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
						<label for="">Kode Buku</label>
						<input type="text" class="form-control" autocomplete="off" required name="kd_buku" id="buku-search" disabled type="text" value="">
						<div class="input-group input-group-outline">
							<a data-bs-toggle="modal" data-bs-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
						</div>
						<label for="">Data Buku</label>
						<div class="input-group input-group-outline">
							<div id="result_tunggu_buku"> <p style="color:red">* Silahkan Tambahkan Data</p></div>
							<div id="result_buku"></div>
						</div>

						<hr>
						<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
						<a href="<?= base_url('admin/transaksi/peminjaman') ?>" class="btn btn-danger">Kembali</a>

					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
	
</div>

<!-- Modal Simpan -->
<div class="modal fade" id="TableAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div
					class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
					<h6 class="modal-title text-white text-capitalize ps-3">Cari Anggota</h6>
					<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Telepon</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1;foreach($user as $u):
						if($u->role == 'anggota'):
						?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $u->id_user;?></td>
							<td><?= $u->nama;?></td>
							<td><?= $u->no_telp;?></td>
							<td><?= $u->role;?></td>
							<td style="width:20%;">
								<button class="btn btn-primary" id="Select_File1" data_id="<?= $u->id_user;?>">
								<i class="fa fa-check"> </i> Pilih
								</button>
							</td>
						</tr>
						<?php endif ?>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(".fileSelection1 #Select_File1").click(function (e) {
		document.getElementsByName('id_user')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		console.log($(this).attr("data_id"));
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('admin/transaksi/result_peminjam');?>",
			data:'id_user='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
	</script>

	<!-- Modal Simpan -->
<div class="modal fade" id="TableBuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div
					class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
					<h6 class="modal-title text-white text-capitalize ps-3">Cari Anggota</h6>
					<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="datatable1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>ISBN</th>
						<th>Judul Buku</th>
						<th>Penerbit</th>
						<th>Tahun Buku</th>
						<th>Stok Buku</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $no=1;foreach($buku as $row):?>
						<tr>
							<td><?= $no;?></td>
							<td><?= $row->isbn ?></td>
							<td><?= $row->judul_buku ?></td>
							<td><?= $row->penerbit ?></td>
							<td><?= $row->tahun_terbit ?></td>
							<td><?= $row->jumlah_buku ?></td>
							<td style="width:17%">
							<button class="btn btn-primary" id="Select_File2" data_id="<?= $row->kd_buku ?>">
								<i class="fa fa-check"> </i> Pilih
							</button>
							<a href="<?= base_url('admin/data/detailbuku/').$row->kd_buku ?>" target="_blank">
								<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
							</td>
						</tr>
					<?php $no++; endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('kd_buku')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('admin/transaksi/buku');?>",
			data:'kd_buku='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_buku").load("<?= base_url('admin/transaksi/buku_list');?>");
				$("#result_tunggu_buku").html('');
			}
		});
	});
	</script>

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
	} );
</script>