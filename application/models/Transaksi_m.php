<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{

    public function getPeminjamanDistinctUser($id_user)
    {
        return $this->db->query("SELECT DISTINCT `no_pinjam`, peminjaman.`id_user`, 
            `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` , `nama`
            FROM peminjaman 
            INNER JOIN user ON user.id_user = peminjaman.id_user
            WHERE status = 'Dipinjam' AND peminjaman.id_user = '$id_user' ORDER BY no_pinjam DESC")->result();
    }

    public function getPeminjamanDistinct()
    {
        return $this->db->query("SELECT DISTINCT `no_pinjam`, peminjaman.`id_user`, 
            `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` , `nama`
            FROM peminjaman 
            INNER JOIN user ON user.id_user = peminjaman.id_user
            WHERE status = 'Dipinjam' ORDER BY no_pinjam DESC")->result();
    }

    public function getPeminjamanByNoPinjamDistinct($no_pinjam)
    {
        return $this->db->query("SELECT DISTINCT `no_pinjam`, peminjaman.`id_user`, 
            `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` , `nama`, `email`, `no_telp`, `role`
            FROM peminjaman 
            INNER JOIN user ON user.id_user = peminjaman.id_user
            WHERE no_pinjam='$no_pinjam' ORDER BY no_pinjam DESC")->result();
    }

    public function getPeminjaman()
    {
        $this->db->join('user', 'user.id_user = peminjaman.id_user');
        $this->db->order_by('id_pinjam', 'DESC');
        $this->db->where('status','Dipinjam');
        return $this->db->get('peminjaman')->result();
    }

    public function simpanPinjam($post)
    {
        $tgl = $post['tgl_pinjam'];
        $tgl2 = date('Y-m-d', strtotime('+'.$post['lama_pinjam'].' days', strtotime($tgl)));

        $hasil_cart = array_values(unserialize($this->session->userdata('cart')));

        foreach($hasil_cart as $isi)
        {
            $data[] = array(
                'no_pinjam'=>htmlentities($post['no_pinjam']), 
                'id_user'=>htmlentities($post['id_user']), 
                'kd_buku' => $isi['id'], 
                'status' => 'Dipinjam', 
                'tgl_pinjam' => htmlentities($post['tgl_pinjam']), 
                'lama_pinjam' => htmlentities($post['lama_pinjam']), 
                'tgl_balik'  => $tgl2, 
                'tgl_kembali'  => '0',
            );
        }
        
        $total_array = count($data);
        if($total_array != 0)
        {
            $this->db->insert_batch('peminjaman',$data);

            $cart = array_values(unserialize($this->session->userdata('cart')));
            for ($i = 0; $i < count($cart); $i ++){
                unset($cart[$i]);
                // $this->session->unset_userdata($cart[$i]);
                // $this->session->unset_userdata('cart');
            }
            return true;
        }
        return false;
    }

    public function buatKodePinjam()
    {
        $query = $this->db->query("SELECT * FROM peminjaman ORDER BY id_pinjam DESC LIMIT 1"); // cek dulu apakah ada sudah ada kode di tabel.
        
        if($query->num_rows() > 0){
        //jika kode ternyata sudah ada.
            $hasil = $query->row();
            $kd = $hasil->id_pinjam;
            $cd = $kd;
            $kode = $cd + 1;
            $kodejadi = "PJ00".$kode;    // hasilnya CUS-0001 dst.
        }else {
            //jika kode belum ada
            $kode = 0+1;
            $kodejadi = "PJ00".$kode;    // hasilnya CUS-0001 dst.
        }
        return $kodejadi;
    }

    function rp($angka){
        $hasil_rupiah = "Rp" . number_format($angka,0,',','.'). ',-';
        return $hasil_rupiah;
    }

    public function hapusPinjam($no_pinjam)
    {
        return $this->db->delete('peminjaman', ['no_pinjam' => $no_pinjam]);
    }

    function getBiayaDenda()
    {
        $this->db->where('stat','Aktif');
        return $this->db->get('biaya_denda')->row();
    }

    public function getPengembalianDistinct()
    {
        return $this->db->query("SELECT DISTINCT `no_pinjam`, peminjaman.`id_user`, 
            `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` , `nama`
            FROM peminjaman 
            INNER JOIN user ON user.id_user = peminjaman.id_user
            WHERE status = 'Di Kembalikan' ORDER BY no_pinjam DESC")->result();
    }

    public function getPengembalianDistinctUser($id_user)
    {
        return $this->db->query("SELECT DISTINCT `no_pinjam`, peminjaman.`id_user`, 
            `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` , `nama`
            FROM peminjaman 
            INNER JOIN user ON user.id_user = peminjaman.id_user
            WHERE status = 'Di Kembalikan' AND peminjaman.id_user='$id_user' ORDER BY no_pinjam DESC")->result();
    }

    public function simpanKembalikan($no_pinjam)
    {
        $pinjam = $this->db->query("SELECT  * FROM peminjaman WHERE no_pinjam = '$no_pinjam'");
        
        foreach($pinjam->result_array() as $row){
            $pinjam_id = $row['no_pinjam'];
            $denda = $this->db->query("SELECT * FROM denda WHERE no_pinjam = '$no_pinjam'");
            $jml = $this->db->query("SELECT * FROM peminjaman WHERE no_pinjam = '$no_pinjam'")->num_rows();			
            if($denda->num_rows() > 0){
                $s = $denda->row();
                echo $s->denda;
            }else{
                $date1 = date('Ymd');
                $date2 = preg_replace('/[^0-9]/','',$row['tgl_balik']);
                $diff = $date2 - $date1;
                if($diff >= 0 )
                {
                    $harga_denda = 0;
                    $lama_waktu = 0;
                }else{
                    $dd = $this->transaksi_m->getBiayaDenda();
                    $harga_denda = $jml*($dd->harga_denda*abs($diff));
                    $lama_waktu = abs($diff);
                }
            }
        }

        $data = [
            'status' => 'Di Kembalikan', 
            'tgl_kembali'  => date('Y-m-d'),
        ];
        
        $total_array = count($data);
        if($total_array != 0)
        {	
            $this->db->where('no_pinjam',$no_pinjam);
            $this->db->update('peminjaman',$data);
        }

        $data_denda = array(
            'no_pinjam' => $no_pinjam, 
            'denda' => $harga_denda, 
            'lama_waktu'=>$lama_waktu, 
            'tgl_denda'=> date('Y-m-d'),
        );

        return $this->db->insert('denda',$data_denda);
        
    }

}



