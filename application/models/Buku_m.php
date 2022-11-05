<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_m extends CI_Model
{

    public function getBuku($kd_buku = null)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        if ($kd_buku != null) {
            $this->db->where('kd_buku', $kd_buku);
        }
        return $this->db->get('buku')->result();
    }

    public function getBukuByName($name)
    {
        $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori');
        $this->db->order_by('judul_buku', 'ASC');
        $this->db->like('judul_buku', $name,'both');
        return $this->db->get('buku')->result();
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

    public function hapusKategori($id)
    {
        return $this->db->delete('kategori', ['id_kategori' => $id]);
    }

}



