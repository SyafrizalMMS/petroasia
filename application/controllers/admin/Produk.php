<?php

//error upload -->
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //data produk
    public function index()
    {
        $produk = $this->produk_model->listing();
        $data = ['titel' => 'Data Produk',
                 'titel2' => 'Detail Data Produk',
                 'produk' => $produk,
                 'isi' => 'admin/produk/list',
                ];
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //gambar
    public function gambar($id_produk)
    {
        $produk = $this->produk_model->detail($id_produk);
        $gambar = $this->produk_model->gambar($id_produk);

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Nama Gambar', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/image/thumbs';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2400';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                //end validasi

                $data = ['titel' => 'Tambah Gambar Produk:'.$produk->nama_produk,
                 'titel2' => 'Form Tambah Gambar Produk',
                 'produk' => $produk,
                 'gambar' => $gambar,
                 'error' => $this->upload->display_error(),
                 'isi' => 'admin/produk/gambar',
                ];

                $this->load->view('admin/layout/wrapper', $data, false);

            // masuk database
            } else {
                $upload_gambar = ['upload_data' => $this->upload->data()];

                //create thumbnail gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/image/thumbs'.$upload_gambar['upload_data']['file_name'];
                // lokasi folder thumbnail
                $config['new_image'] = './assets/upload/image/thumbs/';
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['width'] = 250; //pixel
                $config['height'] = 250; //pixel
                $config['thumb_marker'] = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                //end create

                $i = $this->input;
                $data = ['id_produk' => $id_produk,
                        'judul_gambar' => $i->post('judul_gambar'),
                        //disimpang nama file gambar
                        'gambar' => $upload_gambar['upload_data']['file_name'],
                        ];

                $this->produk_model->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Data gambar telah ditambahkan');
                redirect(base_url('admin/produk/gambar/'.$id_produk), 'refresh');
            }
        }
        //END DATA MASUK

        $data = ['titel' => 'Tambah Gambar Produk: '.$produk->nama_produk,
                 'titel2' => 'Form Data Gambar Produk ',
                 'titel3' => 'Data Produk Detail',
                 'produk' => $produk,
                 'gambar' => $gambar,
                 'isi' => 'admin/produk/gambar',
                ];

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //tambah data produk
    public function tambah()
    {
        //ambil data kategori
        $kategori = $this->kategori_model->listing();
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]',
        ['required' => '%s harus diisi',
        'is_unique' => '%s kode produk sudah ada. Buat kode baru.',
        ]);

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/image/thumbs';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2400';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                //end validasi

                $data = ['titel' => 'Tambah Data Produk',
                 'titel2' => 'Form Data Produk',
                 'kategori' => $kategori,
                 'error' => $this->upload->display_error(),
                 'isi' => 'admin/produk/tambah',
                ];

                $this->load->view('admin/layout/wrapper', $data, false);

            // masuk database
            } else {
                $upload_gambar = ['upload_data' => $this->upload->data()];

                //create thumbnail gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/image/thumbs'.$upload_gambar['upload_data']['file_name'];
                // lokasi folder thumbnail
                $config['new_image'] = './assets/upload/image/thumbs/';
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['width'] = 250; //pixel
                $config['height'] = 250; //pixel
                $config['thumb_marker'] = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                //end create

                $i = $this->input;
                //slug produk
                $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', true);
                $data = ['id_user' => $this->session->userdata('id_user'),
                        'id_kategori' => $i->post('id_kategori'),
                        'kode_produk' => $i->post('kode_produk'),
                        'nama_produk' => $i->post('nama_produk'),
                        'slug_produk' => $slug_produk,
                        'keterangan' => $i->post('keterangan'),
                        'keywords' => $i->post('keywords'),
                        'harga' => $i->post('harga'),
                        'stok' => $i->post('stok'),
                        //disimpang nama file gambar
                        'gambar' => $upload_gambar['upload_data']['file_name'],
                        'berat' => $i->post('berat'),
                        'ukuran' => $i->post('ukuran'),
                        'status_produk' => $i->post('status_produk'),
                        'tanggal_post' => date('Y-m-d H:i:s'),
                        ];

                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //END DATA MASUK

        $data = ['titel' => 'Tambah Data Produk',
                 'titel2' => 'Form Data Produk',
                 'kategori' => $kategori,
                 'isi' => 'admin/produk/tambah',
                    ];

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //edit data produk
    public function edit($id_produk)
    {
        // ambil data produk yang akan diedit
        $produk = $this->produk_model->detail($id_produk);
        //ambil data kategori
        $kategori = $this->kategori_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama Produk', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('kode_produk', 'Kode Produk', 'required',
        ['required' => '%s harus diisi']);

        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/image/thumbs';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    //end validasi

                    $data = ['titel' => 'Edit Data Produk: '.$produk->nama_produk,
                            'titel2' => 'Form Edit Data Produk',
                            'kategori' => $kategori,
                            'produk' => $produk,
                            'error' => $this->upload->display_error(),
                            'isi' => 'admin/produk/edit',
                            ];

                    $this->load->view('admin/layout/wrapper', $data, false);

                // masuk database
                } else {
                    $upload_gambar = ['upload_data' => $this->upload->data()];

                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/image/thumbs'.$upload_gambar['upload_data']['file_name'];
                    // lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/image/thumbs/';
                    $config['create_thumb'] = true;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 250; //pixel
                $config['height'] = 250; //pixel
                $config['thumb_marker'] = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    //end create

                    $i = $this->input;
                    //slug produk
                    $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', true);
                    $data = ['id_produk' => $id_produk,
                        'id_user' => $this->session->userdata('id_user'),
                        'id_kategori' => $i->post('id_kategori'),
                        'kode_produk' => $i->post('kode_produk'),
                        'nama_produk' => $i->post('nama_produk'),
                        'slug_produk' => $slug_produk,
                        'keterangan' => $i->post('keterangan'),
                        'keywords' => $i->post('keywords'),
                        'harga' => $i->post('harga'),
                        'stok' => $i->post('stok'),
                        //disimpang nama file gambar
                        'gambar' => $upload_gambar['upload_data']['file_name'],
                        'berat' => $i->post('berat'),
                        'ukuran' => $i->post('ukuran'),
                        'status_produk' => $i->post('status_produk'),
                        ];

                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/produk'), 'refresh');
                }
            } else {
                //edit produk tanpa ganti gambar
                $i = $this->input;
                //slug produk
                $slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', true);
                $data = ['id_produk' => $id_produk,
                        'id_user' => $this->session->userdata('id_user'),
                        'id_kategori' => $i->post('id_kategori'),
                        'kode_produk' => $i->post('kode_produk'),
                        'nama_produk' => $i->post('nama_produk'),
                        'slug_produk' => $slug_produk,
                        'keterangan' => $i->post('keterangan'),
                        'keywords' => $i->post('keywords'),
                        'harga' => $i->post('harga'),
                        'stok' => $i->post('stok'),
                        //disimpang nama file gambar (gambar tidak diganti)
                        // 'gambar' => $upload_gambar['upload_data']['file_name'],
                        'berat' => $i->post('berat'),
                        'ukuran' => $i->post('ukuran'),
                        'status_produk' => $i->post('status_produk'),
                        ];

                $this->produk_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //END DATA MASUK KE DATABASE

        $data = ['titel' => 'Edit Data Produk: '.$produk->nama_produk,
                 'titel2' => 'Form Edit Data Produk',
                 'kategori' => $kategori,
                 'produk' => $produk,
                 'isi' => 'admin/produk/edit',
                    ];

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //DELETE GAMBAR
    public function delete($id_produk)
    {
        //proses hapus gambar
        $produk = $this->produk_model->detail($id_produk);
        unlink('./assets/upload/image/thumbs/'.$produk->gambar);
        //end proses hapus gambar
        $data = ['id_produk' => $id_produk];
        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk/'), 'refresh');
    }

    //DELETE GAMBAR PRODUCT
    public function delete_gambar($id_produk, $id_gambar)
    {
        //proses hapus gambar
        $gambar = $this->produk_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        //end proses hapus gambar
        $data = ['id_gambar' => $id_gambar];
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
        redirect(base_url('admin/produk/gambar/'.$id_produk), 'refresh');
    }
}
