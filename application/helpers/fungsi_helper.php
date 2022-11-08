<?php

function check_already_admin_login()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->session->userdata('role') == 'admin') {
        redirect('admin/dashboard');
    }
}

function check_admin_not_login()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->session->userdata('role') != 'admin') {
        redirect('auth/login');
    }
}

function check_already_anggota_login()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->session->userdata('role') == 'anggota') {
        redirect(base_url());
    }
}

function check_anggota_not_login()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->session->userdata('role') != 'anggota') {
        redirect('auth/login');
    }
}


function check_user_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        return true;
    }
    return false;
}

function is_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    return $ci->fungsi->user_login()->role == 'admin';
}
