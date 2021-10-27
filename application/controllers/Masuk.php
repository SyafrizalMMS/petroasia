<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
    }

    //login pelanggan
    public function index()
    {
        //validasi
        $this->form_validation->set_rules('email', 'Email/Username', 'required',
                                        ['required' => '%s harus diisi']);

        $this->form_validation->set_rules('password', 'Password', 'required',
                                        ['required' => '%s harus diisi']);

        if ($this->form_validation->run()) 
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //proses ke simple pelanggan (libraries)
            $this->simple_pelanggan->login($email, $password);
        }
        //end validation

        $data = ['titel' => 'Login Pelanggan',
                    'isi' => 'masuk/list',
                ];
        $this->load->view('layout/wrapper', $data, false);
    }
    //fungsi logout
    public function logout()
    {
        //ambil fungsi logout dari simple_pelanggan yang sudah diset di autoload libraries
        $this->simple_pelanggan->logout();
    }
}
