<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $this->simple_login->cek_login();
        $data = ['titel' => 'Halaman Admintrator',
                 'titel2' => 'Data Administrator',
                 'isi' => 'admin/dashboard/list', ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }
}

/* End of file Dashboard.php */
