<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //data kategori
    public function index()
    {
        $kategori = $this->Kategori_model->listing();
        $data = ['titel' => 'Data Kategori Produk',
                 'titel2' => 'Detail Kategori Produk',
                    'kategori' => $kategori,
                    'isi' => 'admin/kategori/list',
                ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //tambah data kategori
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]',
                ['required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat kategori baru!', ]);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Tambah Data Kategori Produk',
                    'titel2' => 'Form Data Kategori Produk',
                    'isi' => 'admin/kategori/tambah',
                    ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', true);
            $data = ['slug_kategori' => $slug_kategori,
                    'nama_kategori' => $i->post('nama_kategori'),
                    'urutan' => $i->post('urutan'),
                    ];

            $this->Kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //END DATA MASUK
    }

    //edit data kategori
    public function edit($id_kategori)
    {
        $kategori = $this->Kategori_model->detail($id_kategori);
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_kategori', 'Nama Kategori', 'required',
                 ['required' => '%s harus diisi']);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Edit Data Kategori Produk',
                  'titel2' => 'Form Edit Data Kategori Produk',
                  'kategori' => $kategori,
                  'isi' => 'admin/kategori/edit',
                 ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $slug_kategori = url_title($this->input->POST('nama_kategori'), 'dash', true);
            $data = ['id_kategori' => $id_kategori,
                    'slug_kategori' => $slug_kategori,
                    'nama_kategori' => $i->POST('nama_kategori'),
                    'urutan' => $i->POST('urutan'),
                    ];
            $this->Kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //END DATA MASUK
    }

    //DELETE USER
    public function delete($id_kategori)
    {
        $data = ['id_kategori' => $id_kategori];
        $this->Kategori_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/kategori'), 'refresh');
    }
}
