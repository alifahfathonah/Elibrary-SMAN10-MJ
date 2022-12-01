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
        $this->load->library('pagination');

        $config['base_url'] = base_url('buku/index');
        $config['total_rows'] = $this->buku_m->getJumlahBuku();
        $config['per_page'] = 12;

        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active "><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';

        $from = $this->uri->segment(3) ?? 0;

        $this->pagination->initialize($config);	

        $data['buku'] = $this->buku_m->data($config['per_page'], $from);
        
        $this->template->load('template_home/template_home','home/buku', $data);
    }

    public function cari()
    {
        $this->load->library('pagination');


        $search = $this->input->post('search');
        $search = $this->uri->segment(3) ?? $search;
        $search = str_replace('%20', ' ', $search);
    
        if(in_array($search, ['', null])){
            redirect(base_url('buku'));
        }

        $config['base_url'] = base_url('buku/cari/').$search;
        $config['total_rows'] = $this->buku_m->getJumlahBuku($search);
        $config['per_page'] = 12;

        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active "><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';

        $from = $this->uri->segment(4) ?? 0;

        $this->pagination->initialize($config);	

        $data['buku'] = $this->buku_m->data($config['per_page'], $from, $search);
        $data['search'] = $search;
        
        $this->template->load('template_home/template_home','home/buku', $data);
    }

    public function detail($kd_buku)
    {
        $data = [
            'buku' => $this->buku_m->getBuku($kd_buku)[0],
            'koleksi' => $this->buku_m->getKoleksi(),
        ];

        $this->template->load('template_home/template_home','buku/data_buku_detail', $data);
    }

}