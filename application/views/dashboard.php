<div class="container-fluid py-4">
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10" translate="no">table_view</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Pendapatan Hari Ini</p>
						<h4 class="mb-0">Rp. <?= number_format($pendapatan['pendapatan_sekarang'] ?? 0) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span
							class="<?= ($pendapatan['persentase_pendapatan_sekarang'] >= 0) ? 'text-success' : 'text-danger' ?> text-sm font-weight-bolder"><?= ($pendapatan['persentase_pendapatan_sekarang'] >= 0) ? "+" : ""?><?=$pendapatan['persentase_pendapatan_sekarang'] ?>%
						</span>dari kemarin</p> -->
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10" translate="no">receipt</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Pengeluaran Hari Ini</p>
						<h4 class="mb-0">Rp. <?= number_format($pengeluaran['pengeluaran_sekarang']  ?? 0) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span
							class="<?= ($pengeluaran['persentase_pengeluaran_sekarang'] >= 0) ? 'text-success' : 'text-danger' ?> text-sm font-weight-bolder"><?= ($pengeluaran['persentase_pengeluaran_sekarang'] >= 0) ? "+" : ""?><?=$pengeluaran['persentase_pengeluaran_sekarang'] ?>%
						</span>dari kemarin</p> -->
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10" translate="no">notes</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Transaksi Hari Ini</p>
						<h4 class="mb-0"><?= number_format($transaksi['transaksi_sekarang']  ?? 0) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span
							class="<?= ($transaksi['persentase_transaksi_sekarang'] >= 0) ? 'text-success' : 'text-danger' ?> text-sm font-weight-bolder"><?= ($transaksi['persentase_transaksi_sekarang'] >= 0) ? "+" : ""?><?=$transaksi['persentase_transaksi_sekarang'] ?>%
						</span> dari kemarin</p> -->
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6">
			<div class="card">
				<div class="card-header p-3 pt-2">
					<div
						class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
						<i class="material-icons opacity-10" translate="no">autorenew</i>
					</div>
					<div class="text-end pt-1">
						<p class="text-sm mb-0 text-capitalize">Pending</p>
						<h4 class="mb-0"><?= number_format($pending  ?? 0) ?></h4>
					</div>
				</div>
				<hr class="dark horizontal my-0">
				<div class="card-footer p-3">
					<!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">&nbsp</span></p> -->
				</div>
			</div>
		</div>
	</div>
	
	<div class="row mb-4 mt-4">
		<div class="card my-4">
			<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
					<h6 class="text-white text-capitalize ps-3">Peminjaman Terbaru</h6>
				</div>
			</div>
			<div class="card-body px-0 pb-2">
				<div class="table-responsive p-0">
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
									<a href="<?= base_url('admin/transaksi/detail_pinjam/').$row->no_pinjam ?>"
										class="text-secondary text-success font-weight-bold text-xs">
										<i class="material-icons opacity-10" translate="no">visibility
										</i>
									</a> 
									|
									<a href="<?= base_url('admin/transaksi/pinjam_hapus/').$row->no_pinjam ?>"
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

<script>
	$(document).ready(function () {
		var ctx1 = document.getElementById("chart-pendapatan").getContext("2d");

		new Chart(ctx1, {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
					"Dec"],
				datasets: [{
					label: "Pemasukan",
					tension: 0,
					borderWidth: 0,
					pointRadius: 5,
					pointBackgroundColor: "rgba(255, 255, 255, .8)",
					pointBorderColor: "transparent",
					borderColor: "rgba(255, 255, 255, .8)",
					borderColor: "rgba(255, 255, 255, .8)",
					borderWidth: 4,
					backgroundColor: "transparent",
					fill: true,
					data: <?= json_encode($chart['cpdt']) ?> ,
					maxBarThickness: 6

				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5],
							color: 'rgba(255, 255, 255, .2)'
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});

		var ctx2 = document.getElementById("chart-pengeluaran").getContext("2d");

		new Chart(ctx2, {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
					"Dec"],
				datasets: [{
					label: "Pengeluaran",
					tension: 0,
					borderWidth: 0,
					pointRadius: 5,
					pointBackgroundColor: "rgba(255, 255, 255, .8)",
					pointBorderColor: "transparent",
					borderColor: "rgba(255, 255, 255, .8)",
					borderWidth: 4,
					backgroundColor: "transparent",
					fill: true,
					data: <?= json_encode($chart['cpgt']) ?> ,
					maxBarThickness: 6

				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5],
							color: 'rgba(255, 255, 255, .2)'
						},
						ticks: {
							display: true,
							padding: 10,
							color: '#f8f9fa',
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});

		var ctx3 = document.getElementById("chart-transaksi").getContext("2d");

		new Chart(ctx3, {
			type: "bar",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
					"Dec"],
				datasets: [{
					label: "Transaksi",
					tension: 0.4,
					borderWidth: 0,
					borderRadius: 4,
					borderSkipped: false,
					backgroundColor: "rgba(255, 255, 255, .8)",
					data: <?= json_encode($chart['ctt']) ?> ,
					maxBarThickness: 6
				}, ],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5],
							color: 'rgba(255, 255, 255, .2)'
						},
						ticks: {
							suggestedMin: 0,
							suggestedMax: 500,
							beginAtZero: true,
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
							color: "#fff"
						},
					},
					x: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5],
							color: 'rgba(255, 255, 255, .2)'
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});

	})

</script>
