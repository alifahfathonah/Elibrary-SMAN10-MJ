
<!-- Modal Denda -->
<div class="modal fade" id="ModalDenda" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
				<div
					class="w-100 bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
					<h6 class="modal-title text-white text-capitalize ps-3">Pengembalian Buku</h6>
					<button type="button" class="btn-close me-2" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="example3" class="table table-striped">
					<tbody>
            <tr>
              <td>No Peminjaman</td>
              <td>:</td>
              <td><?= $peminjaman->no_pinjam ?></td>
            </tr>
            <tr>
              <td>Tanggal Peminjaman</td>
              <td>:</td>
              <td><?= $peminjaman->tgl_pinjam ?></td>
            </tr>
            <tr>
              <td>Tanggal Pengembalian</td>
              <td>:</td>
              <td><?= $peminjaman->tgl_balik ?></td>
            </tr>
            <tr>
              <td>Id Anggota</td>
              <td>:</td>
              <td><?= '('.$peminjaman->id_user. ') ' .$peminjaman->nama ?></td>
            </tr>
            <tr>
              <td>Lama Peminjaman</td>
              <td>:</td>
              <td><?= $peminjaman->lama_pinjam ?> Hari</td>
            </tr>
            <tr>
              <td>Tanggal Pengembalian</td>
              <td>:</td>
              <td><?= date('Y-m-d');?> ( Sekarang )</td>
            </tr>
            <tr>
              <td>Lewat Waktu Pengembalian</td>
              <td>:</td>
              <td>
                <?php
                  $date1 = date('Ymd');
                  $date2 = preg_replace('/[^0-9]/','',$peminjaman->tgl_balik);
                  $diff = $date1 - $date2;
                  if($diff > 0)
                  {
                    echo abs($diff);

                  }else{
                    echo '0';
                  }
                ?> Hari
              </td>
            </tr>
            <tr>
              <td>Detail Buku</td>
              <td>:</td>
              <td>
                <table>
                  <?php 
                    $no=1;
                    foreach($buku as $b) :
                  ?>
                    <tr>
                      <td><?= $no++;?>.</td>
                      <td>(<?= $b->kd_buku;?>)</td>
                      <td><?= $b->judul_buku;?></td>
                      <td>(<?= $b->tahun_terbit;?>)</td>
                    </tr>
                  <?php endforeach ?>

                </table>
              </td>
            </tr>
            <tr>
              <td>Total Denda</td>
              <td>:</td>
              <td>
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
              </td>
            </tr>
					</tbody>
				</table>
			</div>
      <div class="modal-footer">
        <div class="pull-right">
          <a href="<?= base_url('admin/transaksi/kembalikan_proses/'.$peminjaman->no_pinjam);?>">
          <button class="btn btn-success"> Proses Pengembalian</button></a>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
		</div>
	</div>
</div>
