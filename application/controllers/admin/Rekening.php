<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekening_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //data rekening
    public function index()
    {
        $rekening = $this->Rekening_model->listing();
        $data = ['titel' => 'Data Rekening',
                 'titel2' => 'Detail Rekening',
                    'rekening' => $rekening,
                    'isi' => 'admin/rekening/list',
                ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //tambah data rekening
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('nomor_rekening', 'Nomor Rekening', 'required|is_unique[rekening.nomor_rekening]',
                ['required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat nomor rekening baru!', ]);

        $valid->set_rules('nama_pemilik', 'Nama Pemilik', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Tambah Data Rekening',
                    'titel2' => 'Form Data Rekening',
                    'isi' => 'admin/rekening/tambah',
                    ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $data = ['nama_bank' => $i->post('nama_bank'),
                    'nomor_rekening' => $i->post('nomor_rekening'),
                    'nama_pemilik' => $i->post('nama_pemilik'),
                    ];

            $this->Rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //END DATA MASUK
    }

    //edit data rekening
    public function edit($id_rekening)
    {
        $rekening = $this->Rekening_model->detail($id_rekening);
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Edit Data Rekening',
                  'titel2' => 'Form Edit Data Rekening',
                  'rekening' => $rekening,
                  'isi' => 'admin/rekening/edit',
                 ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $data = ['id_rekening' => $id_rekening,
                    'nama_bank' => $i->post('nama_bank'),
                    'nomor_rekening' => $i->post('nomor_rekening'),
                    'nama_pemilik' => $i->post('nama_pemilik'),
                    ];
            $this->Rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //END DATA MASUK
    }

    //DELETE USER
    public function delete($id_rekening)
    {
        $data = ['id_rekening' => $id_rekening];
        $this->Rekening_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/rekening'), 'refresh');
    }
}
