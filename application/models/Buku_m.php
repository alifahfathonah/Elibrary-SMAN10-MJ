<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_m extends CI_Model
{

    public function getJumlahBuku($s = null)
    {
        if ($s != null) {
            $this->db->like('judul_buku', $s,'both');
        }
        return $this->db->get('buku')->num_rows();
    }

    public function data($number,$offset, $s = null){
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        if ($s != null) {
            $this->db->like('judul_buku', $s,'both');
        }
		return $query = $this->db->get('buku',$number,$offset)->result();		
	}

    public function getBuku($kd_buku = null)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        if ($kd_buku != null) {
            $this->db->where('kd_buku', $kd_buku);
        }
        return $this->db->get('buku')->result();
    }

    public function getKoleksi()
    {
        $this->db->order_by('RAND()');
        $this->db->limit('6');
        return $this->db->get('buku')->result();
    }

    public function getKoleksiTerbaru()
    {
        $this->db->select("*, CAST(SUBSTR(kd_buku,5) AS UNSIGNED) as order_id");
        $this->db->order_by('order_id', 'DESC');
        $this->db->limit('6');
        return $this->db->get('buku')->result();
    }

    public function getKoleksiKategori()
    {
        $this->db->select('id_kategori, nama_kategori');

        $this->db->order_by('RAND()');
        $this->db->limit('3');

        $kategori = $this->db->get('kategori')->result();
        $koleksi = [];
        foreach($kategori as $k) {
            $this->db->order_by('RAND()');
            $this->db->limit('6');
            $this->db->where('id_kategori', $k->id_kategori);
            $koleksi[$k->nama_kategori] = $this->db->get('buku')->result();
        }
        return $koleksi;
    }

    public function getKoleksiPopuler()
    {
        $this->db->select("COUNT(*) as jumlah, buku.*");
        $this->db->join('buku', 'peminjaman.kd_buku = buku.kd_buku');
        $this->db->group_by('peminjaman.kd_buku');
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit('6');

        return $this->db->get('peminjaman')->result();
    }

    public function getBukuByName($name)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        $this->db->like('judul_buku', $name,'both');
        return $this->db->get('buku')->result();
    }

    public function getBukuByKodeBukuNoResult($kd_buku)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        $this->db->where('kd_buku', $kd_buku);
        return $this->db->get('buku');
    }

    public function getBukuByNoPinjam($no_pinjam)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->join('peminjaman', 'peminjaman.kd_buku = buku.kd_buku');
        $this->db->order_by('judul_buku', 'ASC');
        $this->db->where('no_pinjam', $no_pinjam);
        return $this->db->get('buku')->result();
    }

    public function buatKodeBuku()
    {
        $query = $this->db->query("SELECT * FROM buku ORDER BY kd_buku DESC"); // cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() > 0){
            $kd_buku = [];
            foreach($query->result() as $r){
                array_push($kd_buku,substr($r->kd_buku, 4));
            }
        //jika kode ternyata sudah ada.
            $hasil = $query->row();
            $kd = max($kd_buku);
            $cd = $kd;
            $kode = $cd + 1;
            $kodejadi = "BK00".$kode;    // hasilnya CUS-0001 dst.
        }else {
            //jika kode belum ada
            $kode = 0+1;
            $kodejadi = "BK00".$kode;    // hasilnya CUS-0001 dst.
        }
        return $kodejadi;
    }

    public function simpanBuku($post)
    {
        $data = [
            'kd_buku' => $post['kd_buku'],
            'judul_buku' => $post['judul_buku'],
            'pengarang' => $post['pengarang'],
            'tahun_terbit' => $post['tahun_terbit'],
            'penerbit' => $post['penerbit'],
            'id_kategori' => $post['id_kategori'],
            'isbn' => $post['isbn'],
            'jumlah_buku' => $post['jumlah_buku'],
            'cover' => $post['cover'],
            'file' => $post['file'],
        ];

        return $this->db->insert('buku',$data);
    }

    public function ubahBuku($post)
    {
        
        $data = [
            'judul_buku' => $post['judul_buku'],
            'pengarang' => $post['pengarang'],
            'tahun_terbit' => $post['tahun_terbit'],
            'penerbit' => $post['penerbit'],
            'id_kategori' => $post['id_kategori'],
            'isbn' => $post['isbn'],
            'jumlah_buku' => $post['jumlah_buku']
        ];

        if ($post['cover']) {
            $data['cover'] = $post['cover'];
        }
        
        if($post['file']) {
            $data['file'] = $post['file'];
        }
        
        return $this->db->update('buku',$data, ['kd_buku' => $post['kd_buku']]);
    }

    public function hapusBuku($kd_buku)
    {
        $buku = $this->getBuku($kd_buku)[0];
        if (file_exists('./assets/buku/cover/'. $buku->cover)) 
        {
            unlink('./assets/buku/cover/'. $buku->cover);
        }
        if (file_exists('./assets/buku/file/'. $buku->file)) 
        {
            unlink('./assets/buku/file/'. $buku->file);
        }
        return $this->db->delete('buku', ['kd_buku' => $kd_buku]);
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function simpanKategori($post)
    {
        $data = [
            'nama_kategori' => $post['nama_kategori'],
        ];

        return $this->db->insert('kategori',$data);
    }

    public function ubahKategori($post)
    {
        $data = [
            'nama_kategori' => $post['nama_kategori'],
        ];

        return $this->db->update('kategori',$data,[
            'id_kategori' => $post['id_kategori']
        ]);
    }

    public function hapusKategori($id)
    {
        return $this->db->delete('kategori', ['id_kategori' => $id]);
    }

    public function getDenda()
    {
        return $this->db->get('biaya_denda')->result();
    }

    public function simpanDenda($post)
    {
        $data = [
            'harga_denda' => $post['harga_denda'],
            'stat' => empty($this->db->get('biaya_denda')->result()) ? 'Aktif' : 'Tidak Aktif',
            'tgl_tetap' => date('Y-m-d')
        ];

        return $this->db->insert('biaya_denda',$data);
    }

    public function ubahDenda($post)
    {
        $data = [
            'harga_denda' => $post['harga_denda']
        ];

        return $this->db->update('biaya_denda',$data, [
            'id_biaya_denda' => $post['id_biaya_denda']
        ]);
    }

    public function setActiveDenda($id)
    {
        $this->db->update('biaya_denda',[ 'stat' => 'Tidak Aktif']);
        
        return $this->db->update('biaya_denda',[ 'stat' => 'Aktif'], ['id_biaya_denda' => $id]);
    }

    public function hapusDenda($id)
    {
        return $this->db->delete('biaya_denda', ['id_biaya_denda' => $id]);
    }

}



