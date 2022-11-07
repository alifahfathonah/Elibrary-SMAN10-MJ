<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('pengguna_m');
        $this->load->model('transaksi_m');
        $this->load->model('buku_m');
        check_anggota_not_login();


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


    public function profil()
    {
        
        $data = [
            'user' => $this->pengguna_m->getUser($this->session->userdata('id_user'))[0],
            'peminjaman' => $this->transaksi_m->getPeminjamanDistinctUser($this->session->userdata('id_user')),
            'pengembalian' => $this->transaksi_m->getPengembalianDistinctUser($this->session->userdata('id_user')),
        ];

        $this->template->load('template_home/template_home','pengguna/profil',$data);
    }

    public function update_profil()
    {
        
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['simpan'])) {
            $config['upload_path'] = './assets/img/profil/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 4096;
            $config['file_name'] = 'profil-'.date('ymd').time();
            $this->load->library('upload', $config);

            $post['foto'] = null;
            if(@$_FILES['foto']['error'] == 0){
                $user = $this->pengguna_m->getUser($post['id'])[0];
                
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                    if (file_exists('./assets/img/profil/'. $user->foto)) 
                    {
                        unlink('./assets/img/profil/'. $user->foto);
                    }
                }
            }

            if ($this->pengguna_m->updateProfil($post)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil ubah'));
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal diubah username telah ada!'));
            }
            if (is_admin()) {
                redirect('pengguna/lihat_profil/'.$post['id']);
            }else{
                redirect('pengguna/profil/');
            }
        }else{
            if (is_admin()) {
                redirect('pengguna/');
            }else{
                redirect('pengguna/profil/');
            };
        }
    }
    
    public function update_password()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['simpan'])) {
            if ($this->pengguna_m->updatePassword($post)) {
                $this->session->set_flashdata('msg', $this->msgSuccess('Berhasil diubah'));
            }else{
                $this->session->set_flashdata('msg', $this->msgError('Gagal diubah'));
            }
            if (is_admin()) {
                redirect('pengguna/lihat_profil/'.$post['id']);
            }else{
                redirect('pengguna/profil/');
            }
        }else{
            redirect('pengguna/profil/'.$post['id']);
        }
    }

    public function detail_pinjam($no_pinjam)
    {
        $data = [
            'peminjaman' => $this->transaksi_m->getPeminjamanByNoPinjamDistinct($no_pinjam)[0],
            'buku' => $this->buku_m->getBukuByNoPinjam($no_pinjam)
        ];
        
        $this->template->load('template_home/template_home','transaksi/detail_pinjam',$data);
    }
}