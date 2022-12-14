<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->model('laporan_m');
        $this->load->model('transaksi_m');
        check_admin_not_login();
        $data = [
            'buku' => $this->laporan_m->getJumlahBuku(),
            // 'pinjam' => $this->laporan_m->getJumlahPinjam(),
            'anggota' => $this->laporan_m->getJumlahAnggota(),
            'admin' => $this->laporan_m->getJumlahAdmin(),

            'kategori' => $this->laporan_m->getJumlahKategori(),
            // 'peminjaman' => $this->transaksi_m->getPeminjamanDistinct()
        ];
        
        $this->template->load('template/template', 'dashboard', $data);
    }

}
