<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        redirect('admin/dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if (!$user_session) {
        redirect('admin/auth/login');
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

function check_user_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if (!$user_session) {
        return true;
    }
    return false;
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->role != 'admin') {
        redirect('admin/dashboard');
    }
}

function is_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    return $ci->fungsi->user_login()->role == 'admin';
}
