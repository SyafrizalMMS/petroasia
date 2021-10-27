<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('pelanggan_model');
    }

    //fungsi login
    public function login($email, $password)
    {
        $check = $this->ci->pelanggan_model->login($email, $password);
        //jika ada data user, maka create session login
        if ($check) {
            $id_pelanggan = $check->id_pelanggan;
            $nama_pelanggan = $check->nama_pelanggan;
            //create session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email', $email);
            //$this->ci->session->set_userdata('pwd', $password);
            //redirect ke halaman dashboard_masuk yang di proteksi
            redirect(base_url('dashboard'), 'refresh');
        } else {
            //kalau tidak ada, (username atau password salah) maka suruh login lagi
            $this->ci->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //fungsi cek login
    public function cek_login()
    {
        //memeriksa apakah session sudah ada atau belumm, jika belum alihkan ke halaman login
        if (
        $this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //fungsi logout
    public function logout()
    {
        //membuang semua session yang telah diset pada saat login
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('email');
        //setelah session di unset, maka redirect ke login
        $this->ci->session->set_flashdata('logout', 'Anda sudah logout');
        redirect(base_url('masuk'), 'refresh');
    }
}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
