<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_m');
    }

    public function index()
    {
        $data = [
            'koleksi' => $this->buku_m->getKoleksi(),
            'koleksi_terbaru' => $this->buku_m->getKoleksiTerbaru(),
            'koleksi_populer' => $this->buku_m->getKoleksiPopuler(),
            'koleksi_kategori' => $this->buku_m->getKoleksiKategori(),


        ];


        $this->template->load('template_home/template_home','home/home', $data);

    }

}