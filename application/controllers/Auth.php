<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_m');
    }

    public function login()
    {
        if (check_user_login()) {
            if (is_admin()) {
                check_already_admin_login();
            }else{
                check_already_anggota_login();
            }
        }
        
        $this->load->view('auth/login');
    }

    public function logout()
    {
        $sess = [
            'id_user' => '',
            'username' => '',
            'role' => '',
            'nama' => '',
            'foto' => ''
        ];
        $this->session->unset_userdata($sess);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function proses()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['login'])) {
            $admin = $this->pengguna_m->loginAdmin($post);
            $anggota = $this->pengguna_m->loginAnggota($post);
            if($admin->num_rows() > 0 ) {
                $row = $admin->row();
                $params = [
                    'id_user' => $row->id_user,
                    'username' => $row->username,
                    'role' => $row->role,
                    'nama' => $row->nama,
                    'foto' => $row->foto
                ];
                $this->session->set_userdata($params);
                redirect('admin/dashboard');
            }else  if($anggota->num_rows() > 0 ) {
                $row = $anggota->row();
                $params = [
                    'id_user' => $row->id_user,
                    'username' => $row->username,
                    'role' => $row->role,
                    'nama' => $row->nama,
                    'foto' => $row->foto
                ];
                $this->session->set_userdata($params);
                redirect(base_url());
            }else{
                $this->session->set_flashdata('msg','
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">Username/password Salah!</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('auth/login');
            }
        }else{
            redirect('auth/login');
        }
    }

}
