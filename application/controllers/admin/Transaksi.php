<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_admin_not_login();

        $this->load->model('transaksi_m');
        $this->load->model('pengguna_m');
        $this->load->model('buku_m');

    }

    private function msgSuccess($msg)
    {
        return '<div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">'.$msg.'</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }

    private function msgError($msg)
    {
        return '<div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">'.$msg.'</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                        aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }

    public function peminjaman()
    {
        $data = [
            'peminjaman' => $this->transaksi_m->getPeminjamanDistinct()
        ];

        $this->template->load('template/template','transaksi/peminjaman',$data);
    }

    public function tambahpinjam()
    {
        $data = [
            'no_pinjam' => $this->transaksi_m->buatKodePinjam(),
            'user' => $this->pengguna_m->getAnggota(),
            'buku' => $this->buku_m->getBuku()
        ];
        
        $this->template->load('template/template','transaksi/tambahpinjam',$data);
    }

    public function pinjam_proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['simpan'])) {
            if ($this->transaksi_m->simpanPinjam($post)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil ditambahkan'));
                redirect('admin/transaksi/peminjaman');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal ditambahkan!'));
                redirect('admin/transaksi/peminjaman');
            }
        }else{
            redirect('admin/transaksi/peminjaman');
        }
    }

    public function kembalikan_proses($no_pinjam = null)
    {
        if ($no_pinjam != null) {
            if ($this->transaksi_m->simpanKembalikan($no_pinjam)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil dikembalikan'));
                redirect('admin/transaksi/peminjaman');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal dikembalikan!'));
                redirect('admin/transaksi/peminjaman');
            }
        }else{
            redirect('admin/transaksi/peminjaman');
        }
    }

    public function pinjam_hapus($no_pinjam = null)
    {
        if ($id != null) {
            if ($this->transaksi_m->hapusPinjam($no_pinjam)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil dihapus'));
                redirect('admin/transaksi/peminjaman');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal dihapus!'));
                redirect('admin/transaksi/peminjaman');
            }
        }else{
            redirect('admin/transaksi/peminjaman');
        }
    }

    public function detail_pinjam($no_pinjam)
    {
        $data = [
            'peminjaman' => $this->transaksi_m->getPeminjamanByNoPinjamDistinct($no_pinjam)[0],
            'buku' => $this->buku_m->getBukuByNoPinjam($no_pinjam)
        ];
        
        $this->template->load('template/template','transaksi/detail_pinjam',$data);
    }

    public function result_peminjam()
    {	
		
		$user = $this->pengguna_m->getUser($this->input->post('id_user'))[0];
		if($user->nama != null)
		{
			echo '<table class="table table-striped">
                <tr>
                    <td>Nama Anggota</td>
                    <td>:</td>
                    <td>'.$user->nama.'</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>'.$user->no_telp.'</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td>'.$user->email.'</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>:</td>
                    <td>'.$user->role.'</td>
                </tr>
            </table>';
        }else{
            echo 'Anggota Tidak Ditemukan !';
        }
        return true;
        
	}

    public function buku()
    {	
		$kd_buku = $this->input->post('kd_buku');
        $row = $this->buku_m->getBukuByKodeBukuNoResult($kd_buku);

		if($row->num_rows() > 0)
		{
			$tes = $row->row();
			$item = array(
				'id'      => $kd_buku,
				'qty'     => 1,
                'price'   => '1000',
				'name'    => $tes->judul_buku,
				'options' => array('isbn' => $tes->isbn,'thn' => $tes->tahun_terbit,'penerbit' => $tes->penerbit)
			);
			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($kd_buku);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		}else{

		}
        
	}

    public function buku_list()
	{
	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Buku</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1;
				foreach(array_values(unserialize($this->session->userdata('cart'))) as $c){?>
				<tr>
					<td><?= $no;?></td>
					<td><?= $c['name'];?></td>
					<td><?= $c['options']['penerbit'];?></td>
					<td><?= $c['options']['thn'];?></td>
					<td style="width:17%">
					<a href="javascript:void(0)" id="delete_buku<?=$no;?>" data_<?=$no;?>="<?= $c['id'];?>" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function(){
						$("#delete_buku<?=$no;?>").click(function (e) {
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('admin/transaksi/del_cart');?>",
								data:'kd_buku='+$(this).attr("data_<?=$no;?>"),
								beforeSend: function(){
								},
								success: function(html){
									$("#tampil").html(html);
								}
							});
						});
					});
				</script>
			<?php $no++;}?>
			</tbody>
		</table>
		<?php foreach(array_values(unserialize($this->session->userdata('cart'))) as $r){?>
			<input type="hidden" value="<?= $r['id'];?>" name="idbuku[]">
		<?php }?>
		<div id="tampil"></div>
	<?php
	}

    public function del_cart()
    {
		// error_reporting(0);
        $id = $this->input->post('kd_buku');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
       // redirect('jual/tambah');
		echo '<script>$("#result_buku").load("'.base_url('admin/transaksi/buku_list').'");</script>';
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function pengembalian()
    {
        $data = [
            'pengembalian' => $this->transaksi_m->getPengembalianDistinct()
        ];

        $this->template->load('template/template','transaksi/pengembalian',$data);
    }

    
}
