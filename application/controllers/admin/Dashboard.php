<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller
{
    public function index()
    {
        redirect('admin/data/buku');
        // $this->load->model('laporan_m');
        check_not_login();

        $this->template->load('template/template', 'dashboard',$data);
    }

}
