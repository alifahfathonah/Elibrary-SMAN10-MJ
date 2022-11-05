<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('buku_m');
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

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function buku()
    {
        $data = [
            'buku' => $this->buku_m->getBuku(),
            'kategori' => $this->buku_m->getKategori()
        ];
        $this->template->load('template/template','buku/data_buku',$data);
    }

    public function detailbuku($kd_buku)
    {
        $data = [
            'buku' => $this->buku_m->getBuku($kd_buku)[0]
        ];
        $this->template->load('template/template','buku/data_buku_detail',$data);
    }

    public function buku_proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['simpan'])) {
            $post['cover'] = $this->uploadCover();
            $post['file'] = $this->uploadFile();
            if($post['cover'] && $post['file']){
                if ($this->buku_m->simpanBuku($post)) {
                    $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil ditambahkan'));
                    redirect('admin/data/buku');
                }else{
                    $this->session->set_flashdata('msg', $this->msgError('Gagal ditambahkan!'));
                    redirect('admin/data/buku');
                }
            }
            redirect('admin/data/buku');
        }else{
            redirect('admin/data/buku');
        }
    }

    public function buku_hapus($kd_buku = null)
    {
        if ($kd_buku != null) {
            if ($this->buku_m->hapusBuku($kd_buku)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil dihapus'));
                redirect('admin/data/buku');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal dihapus!'));
                redirect('admin/data/buku');
            }
        }else{
            redirect('admin/data/buku');
        }
    }

    public function kategori()
    {
        $data = [
            'kategori' => $this->buku_m->getKategori()
        ];
        $this->template->load('template/template','buku/data_kategori',$data);
    }

    public function kategori_proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['simpan'])) {
            if ($this->buku_m->simpanKategori($post)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil ditambahkan'));
                redirect('admin/data/kategori');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal ditambahkan!'));
                redirect('admin/data/kategori');
            }
        }else{
            redirect('admin/data/kategori');
        }
    }

    public function kategori_hapus($id = null)
    {
        if ($id != null) {
            if ($this->buku_m->hapusKategori($id)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil dihapus'));
                redirect('admin/data/kategori');
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal dihapus!'));
                redirect('admin/data/kategori');
            }
        }else{
            redirect('admin/data/kategori');
        }
    }

    function uploadCover()
    {
        $config['upload_path'] = './assets/buku/cover/';
        $config['allowed_types'] = 'pdf|doc|docx|png|jpg|jpeg';
        $config['max_size'] = 4096;
        $config['file_name'] = 'cover-'.date('ymd').time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(@$_FILES['cover']['error'] == 0){
            if ($this->upload->do_upload('cover')) {
                return $this->upload->data('file_name');
                // if (file_exists('./assets/buku/'.$name.'/'.$buku->foto)) 
                // {
                //     unlink('./assets/buku/'.$name.'/'.$buku->foto);
                // }
            }
            return false;
        }
        return false;
    }

    function uploadFile()
    {
        $config['upload_path'] = './assets/buku/file/';
        $config['allowed_types'] = 'pdf|doc|docx|png|jpg|jpeg';
        $config['max_size'] = 4096;
        $config['file_name'] = 'file-'.date('ymd').time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(@$_FILES['file']['error'] == 0){
            if ($this->upload->do_upload('file')) {
                return $this->upload->data('file_name');
                // if (file_exists('./assets/buku/'.$name.'/'.$buku->foto)) 
                // {
                //     unlink('./assets/buku/'.$name.'/'.$buku->foto);
                // }
            }
            return false;
        }
        return false;
    }

}
