<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    //halaman login
    public function index()
    {
        //validasi
        $this->form_validation->set_rules('username', 'Username', 'required',
                                        ['required' => '%s harus diisi']);

        $this->form_validation->set_rules('password', 'Password', 'required',
                                        ['required' => '%s harus diisi']);

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //proses ke simple login
            $this->simple_login->login($username, $password);
        }
        //end validation

        $data = ['titel' => 'Login Administrator'];
        $this->load->view('login/list', $data, false);
    }

    //fungsi logout
    public function logout()
    {
        //ambil fungsi logout dari simple_login
        $this->simple_login->logout();
    }
}
