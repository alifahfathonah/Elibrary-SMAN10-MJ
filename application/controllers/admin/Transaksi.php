<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transaksi_m');
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
            'peminjaman' => $this->transaksi_m->getPeminjaman()
        ];

        $this->template->load('template/template','transaksi/peminjaman',$data);
    }

    public function tambahpinjam()
    {
        $data = [
            // 'peminjaman' => $this->transaksi_m->getPeminjaman()
        ];
        
        $this->template->load('template/template','transaksi/tambahpinjam',$data);
    }

}
