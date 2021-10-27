<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        //proteksi halaman
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('konfigurasi_model');
        
        
    }

    public function index()
    {
        $header_transaksi = $this->header_transaksi_model->listing();

        $this->simple_login->cek_login();
        $data = ['titel' => 'Data Transaksi',
                 'titel2' => 'Form Data Transaksi',
                 'header_transaksi' => $header_transaksi,
                 'isi' => 'admin/transaksi/list', ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //detail header_transaksi
    public function detail($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        
        $data = ['titel' => 'Tabel Detail Transaksi',
                 'titel2' => 'Form Detail Transaksi',
                 'header_transaksi' => $header_transaksi,
                 'transaksi'    => $transaksi,
                'isi'   => 'admin/transaksi/detail'
                ];

        $this->load->view('admin/layout/wrapper', $data, false);
    
    }

    //Cetak header_transaksi
    public function cetak($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
       $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
       $site=$this->konfigurasi_model->listing();
        
        $data = ['titel' => 'Cetak Transaksi',
                 'titel2' => 'Form Detail Transaksi',
                 'header_transaksi' => $header_transaksi,
                 'transaksi'    => $transaksi,
                 'site' => $site,
                ];

        $this->load->view('admin/transaksi/cetak', $data, false);
    
    }
}