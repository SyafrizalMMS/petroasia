<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //data user
    public function index()
    {
        $user = $this->user_model->listing();
        $data = ['titel' => 'Data Pengguna',
                 'titel2' => 'Tabel Pengguna',
                    'user' => $user,
                    'isi' => 'admin/user/list',
                ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //tambah data user
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Lengkap', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('email', 'Email', 'required|valid_email',
                ['required' => '%s harus diisi',
                 'valid_email' => '%s tidak valid',
                 ]);

        $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[users.username]',
                ['required' => '%s harus diisi',
                 'min_length' => '%s minimal 6 karakter',
                 'max_length' => '%s maksimal 32 karakter',
                 'is_unique' => '%s sudah ada. Buat username baru.',
                ]);

        $valid->set_rules('password', 'Password', 'required',
                            ['required' => '%s harus diisi']);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Tambah Data Pengguna',
                 'titel2' => 'Tabel Data Pengguna',
                 'isi' => 'admin/user/tambah',
                ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $data = ['nama' => $i->post('nama'),
                       'email' => $i->post('email'),
                       'username' => $i->post('username'),
                       'password' => sha1($i->post('password')),
                       'akses_level' => $i->post('akses_level'),
                    ];
            $this->User_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/user'), 'refresh');
        }
        //END DATA MASUK
    }

    //edit data user
    public function edit($id_user)
    {
        $user = $this->user_model->detail($id_user);
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Lengkap', 'required',
                 ['required' => '%s harus diisi']);

        $valid->set_rules('email', 'Email', 'required|valid_email',
                 ['required' => '%s harus diisi',
                  'valid_email' => '%s tidak valid',
                  ]);

        $valid->set_rules('password', 'Password', 'required',
                             ['required' => '%s harus diisi']);

        if ($valid->run() === false) {
            // END VALIDASI

            $data = ['titel' => 'Edit Data Pengguna',
                  'titel2' => 'Tabel Edit Data Pengguna',
                  'user' => $user,
                  'isi' => 'admin/user/edit',
                 ];
            $this->load->view('admin/layout/wrapper', $data, false);

        //masuk database
        } else {
            $i = $this->input;
            $data = ['id_user' => $id_user,
                        'nama' => $i->post('nama'),
                        'email' => $i->post('email'),
                        'username' => $i->post('username'),
                        'password' => sha1($i->post('password')),
                        'akses_level' => $i->post('akses_level'),
                     ];
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/user'), 'refresh');
        }
        //END DATA MASUK
    }

    //DELETE USER
    public function delete($id_user)
    {
        $data = ['id_user' => $id_user];
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}
