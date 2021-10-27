<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('user_model');
    }

    //fungsi login
    public function login($username, $password)
    {
        $check = $this->ci->user_model->login($username, $password);
        //jika ada data user, maka create session login
        if ($check) {
            $id_user = $check->id_user;
            $nama = $check->nama;
            $akses_level = $check->akses_level;

            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('akses_level', $akses_level);
            //redirect ke halaman admin yang di proteksi
            redirect(base_url('admin/dashboard'), 'refresh');
        } else {
            //kalau tidak ada, (username atau password salah) maka suruh login lagi

            $this->ci->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //fungsi cek login
    public function cek_login()
    {
        //memeriksa apakah session sudah ada atau belumm, jika belum alihkan ke halaman login
        if (
        $this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    //fungsi logout
    public function logout()
    {
        //membuang semua session yang telah diset pada saat login
        $this->ci->session->unset_userdata('id_user');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('akses_level');
        //setelah session di unset, maka redirect ke login
        $this->ci->session->set_flashdata('warning', 'Anda sudah logout');
        redirect(base_url('login'), 'refresh');
    }
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
