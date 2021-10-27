<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }

    //konfigurasi umum
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
                ['required' => '%s harus diisi',
                ]);

        if ($valid->run() === false) {
            // END VALIDASI

            $judul = ['titel' => 'Konfigurasi Website Online',
                'titel2' => 'Form Konfigurasi Website',
                'konfigurasi' => $konfigurasi,
                'isi' => 'admin/konfigurasi/list',
                    ];
            $this->load->view('admin/layout/wrapper', $judul, false);

        //masuk database
        } else {
            $i = $this->input;
            $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                    'namaweb' => $i->post('namaweb'),
                    'tagline' => $i->post('tagline'),
                    'email' => $i->post('email'),
                    'website' => $i->post('website'),
                    'keywords' => $i->post('keywords'),
                    'metatext' => $i->post('metatext'),
                    'telepon' => $i->post('telepon'),
                    'alamat' => $i->post('alamat'),
                    'facebook' => $i->post('facebook'),
                    'instagram' => $i->post('instagram'),
                    'deskripsi' => $i->post('deskripsi'),
                    'logo' => $i->post('logo'),
                    'icon' => $i->post('icon'),
                    'rekening_pembayaran' => $i->post('rekening_pembayaran'),
                    ];
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi'), 'refresh');
        }
        //END DATA MASUK
    }

    //kofigurasi logo website
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path'] = './assets/upload/image/logo';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {
                    //end validasi

                    $data = ['titel' => 'Konfigurasi Logo Website',
                 'titel2' => 'Form Konfigurasi Logo',
                 'konfigurasi' => $konfigurasi,
                 'error' => $this->upload->display_error(),
                 'isi' => 'admin/konfigurasi/logo',
                ];

                    $this->load->view('admin/layout/wrapper', $data, false);

                // masuk database
                } else {
                    $upload_gambar = ['upload_data' => $this->upload->data()];

                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/image/logo'.$upload_gambar['upload_data']['file_name'];
                    // lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/image/logo';
                    $config['create_thumb'] = true;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 250; //pixel
                    $config['height'] = 250; //pixel
                    $config['thumb_marker'] = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    //end create

                    $i = $this->input;
                    $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                        'namaweb' => $i->post('namaweb'),
                        //disimpang nama file gambar
                        'logo' => $upload_gambar['upload_data']['file_name'],
                        ];

                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diupdate');
                    redirect(base_url('admin/konfigurasi/logo'), 'refresh');
                }
            } else {
                $i = $this->input;
                $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                        'namaweb' => $i->post('namaweb'),
                        //disimpang nama file gambar
                        //'logo' => $upload_gambar['upload_data']['file_name'],
                        ];

                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate');
                redirect(base_url('admin/konfigurasi/logo'), 'refresh');
            }
        }
        //END DATA MASUK KE DATABASE

        $data = ['titel' => 'Konfigurasi Logo Website',
                 'titel2' => 'Form Konfigurasi Logo',
                 'konfigurasi' => $konfigurasi,
                 'isi' => 'admin/konfigurasi/logo',
                ];

        $this->load->view('admin/layout/wrapper', $data, false);
    }

    //konfigurasi icon website
    public function icon()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path'] = './assets/upload/image/icon';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {
                    //end validasi

                    $data = ['titel' => 'Konfigurasi Icon Website',
                 'titel2' => 'Form Konfigurasi Icon',
                 'konfigurasi' => $konfigurasi,
                 'error' => $this->upload->display_error(),
                 'isi' => 'admin/konfigurasi/icon',
                ];

                    $this->load->view('admin/layout/wrapper', $data, false);

                // masuk database
                } else {
                    $upload_gambar = ['upload_data' => $this->upload->data()];

                    //create thumbnail gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/image/icon/'.$upload_gambar['upload_data']['file_name'];
                    // lokasi folder thumbnail
                    $config['new_image'] = './assets/upload/image/icon/';
                    $config['create_thumb'] = true;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 250; //pixel
                    $config['height'] = 250; //pixel
                    $config['thumb_marker'] = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    //end create

                    $i = $this->input;
                    $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                        'namaweb' => $i->post('namaweb'),
                        //disimpang nama file gambar
                        'icon' => $upload_gambar['upload_data']['file_name'],
                        ];

                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diupdate');
                    redirect(base_url('admin/konfigurasi/icon'), 'refresh');
                }
            } else {
                $i = $this->input;
                $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                        'namaweb' => $i->post('namaweb'),
                        //disimpang nama file gambar
                        //'logo' => $upload_gambar['upload_data']['file_name'],
                        ];

                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate');
                redirect(base_url('admin/konfigurasi/icon'), 'refresh');
            }
        }
        //END DATA MASUK KE DATABASE

        $data = ['titel' => 'Konfigurasi Icon Website',
                 'titel2' => 'Form Konfigurasi Icon',
                 'konfigurasi' => $konfigurasi,
                 'isi' => 'admin/konfigurasi/icon',
                ];

        $this->load->view('admin/layout/wrapper', $data, false);
    }
}
