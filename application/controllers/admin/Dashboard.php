<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller
{
    public function index()
    {
        // $this->load->model('laporan_m');
        $this->load->model('transaksi_m');
        check_admin_not_login();
        $data = [
            'buku' => 0,
            'pinjam' => 0,
            'anggota' => 0,
            'kategori_buku' => 0,
            'peminjaman' => $this->transaksi_m->getPeminjamanDistinct()
        ];
        
        $this->template->load('template/template', 'dashboard', $data);
    }

}
