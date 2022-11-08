<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    public function getLaporan($status, $tgl)
    {
        if ($status == 'Dipinjam') {
            $this->db->order_by('tgl_pinjam', 'ASC');
            $this->db->where('tgl_pinjam' . ' >=', $tgl['mulai']);
            $this->db->where('tgl_pinjam' . ' <=', $tgl['akhir']);
        }else {
            $this->db->order_by('tgl_balik', 'ASC');
            $this->db->where('tgl_balik' . ' >=', $tgl['mulai']);
            $this->db->where('tgl_balik' . ' <=', $tgl['akhir']);
        }
        $this->db->where('status', $status);
        return $this->db->get('peminjaman')->result();
    }

    public function getJumlahBuku()
    {
        return $this->_getCount('buku');
    }

    public function getJumlahPinjam()
    {
        $this->db->where('status', 'Dipinjam');
        return $this->_getCount('peminjaman');
    }

    public function getJumlahAnggota()
    {
        $this->db->where('role', 'anggota');
        return $this->_getCount('user');
    }

    public function getJumlahKategori()
    {
        return $this->_getCount('kategori');
    }

    private function _getCount($table)
    {
        return $this->db->count_all_results($table);
    }

}