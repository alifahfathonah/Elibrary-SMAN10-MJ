<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_m');
    }

    public function index()
    {
        if (@$_GET['search']) {
            $data = [
                'buku' => $this->buku_m->getBukuByName($_GET['search'])
            ];
        }else{
            $data = [
                'buku' => $this->buku_m->getBuku()
            ];
        }
        
        $this->template->load('template_home/template_home','home/buku', $data);
    }

    public function detail($kd_buku)
    {
        $data = [
            'buku' => $this->buku_m->getBuku($kd_buku)[0]
        ];

        $this->template->load('template_home/template_home','home/detail_buku', $data);
    }

}