<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        //halaman ini diproteksi dengan simple_pelanggan => cek login
        $this->simple_pelanggan->cek_login();
    }

    //halaman dashboard
    public function index()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = ['titel' => 'Halaman Dashboard Pelanggan',
                'header_transaksi' => $header_transaksi,
                'isi'   => 'dashboard/list_dashboard_pelanggan'
                ];

        $this->load->view('layout/wrapper', $data, false);
    }

    //belanja
    public function belanja()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = ['titel' => 'Riwayat Belanja',
                 'header_transaksi' => $header_transaksi,
                'isi'   => 'dashboard/belanja'
                ];

        $this->load->view('layout/wrapper', $data, false);
    }

    //detail header_transaksi
    public function detail($kode_transaksi)
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
        
        //pastikan bahwa pelanggan hanya mengakses data transaksinya
        if ($header_transaksi->id_pelanggan != $id_pelanggan){
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
            redirect('masuk');
        }  
       
        $data = ['titel' => 'Riwayat Belanja',
                 'header_transaksi' => $header_transaksi,
                 'transaksi'    => $transaksi,
                'isi'   => 'dashboard/detail'
                ];

        $this->load->view('layout/wrapper', $data, false);
    
    }

    public function profil()
    {
        //ambil data login id_pelanggan dari session
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('alamat', 'Alamat Lengkap', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('telepon', 'Nomor Telepon', 'required',
                ['required' => '%s harus diisi']);

        if ($valid->run() === false) {

        $data = ['titel' => 'Profil Saya',
                 'pelanggan'    => $pelanggan,
                'isi'   => 'dashboard/profil'
                ];

        $this->load->view('layout/wrapper', $data, false);

         //masuk database
        } else {
            $i = $this->input;
            //kalau password lebih dari 6 karakter, maka password di ganti
            if (strlen($i->post('password')) >= 6) {
                $data = ['id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => $i->post('nama_pelanggan'),
                    'password' => sha1($i->post('password')),
                    'telepon' => $i->post('telepon'),
                    'alamat' => $i->post('alamat'),
                    ];
            } else {
                $data = ['id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => $i->post('nama_pelanggan'),
                    'telepon' => $i->post('telepon'),
                    'alamat' => $i->post('alamat'),
                    ];
            }
            
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('Notif_profil', 'Update Profil berhasil');
            redirect(base_url('dashboard/profil'), 'refresh');
        }
        //END DATA MASUK
    }

    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening = $this->rekening_model->listing();

        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_bank', 'Nama Bank', 'required',
                ['required' => '%s harus diisi']);

        $valid->set_rules('rekening_pembayaran', 'Nomor Rekening', 'required',
        ['required' => '%s harus diisi']);

        $valid->set_rules('rekening_pelanggan', 'Nama Pemilik Rekening', 'required',
        ['required' => '%s harus diisi']);

        $valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required',
        ['required' => '%s harus diisi']);

        $valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'required',
        ['required' => '%s harus diisi']);

        if ($valid->run()) {
            //cek jika gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {
                $config['upload_path'] = './assets/upload/image/bukti_bayar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    //end validasi

        $data = ['titel' => 'Konfirmasi Pembayaran',
                 'header_transaksi' => $header_transaksi,
                 'rekening' => $rekening,
                 'error' => $this->upload->display_error(),
                'isi'   => 'dashboard/konfirmasi'
                ];

        $this->load->view('layout/wrapper', $data, false);
            // masuk database
        } else {
            $upload_gambar = ['upload_data' => $this->upload->data()];

            //create thumbnail gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/image/bukti_bayar'.$upload_gambar['upload_data']['file_name'];
            // lokasi folder thumbnail
            $config['new_image'] = './assets/upload/image/bukti_bayar/';
            $config['create_thumb'] = true;
            $config['maintain_ratio'] = true;
            $config['width'] = 250; //pixel
            $config['height'] = 250; //pixel
            $config['thumb_marker'] = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            //end create

            $i = $this->input;
            $data = ['id_header_transaksi' => $header_transaksi->id_header_transaksi,
                'status_bayar'  => 'Konfirmasi',
                'jumlah_bayar'  => $i->post('jumlah_bayar'),
                'rekening_pembayaran'  => $i->post('rekening_pembayaran'),
                'rekening_pelanggan'  => $i->post('rekening_pelanggan'),
                'bukti_bayar' => $upload_gambar['upload_data']['file_name'],
                'id_rekening'  => $i->post('id_rekening'),
                'tanggal_bayar'  => $i->post('tanggal_bayar'),
                'nama_bank'  => $i->post('nama_bank'),

                ];

            $this->header_transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil dilakukan');
            redirect(base_url('dashboard'), 'refresh');
        }
            } else {
                //edit produk tanpa ganti gambar
                $i = $this->input;
                $data = ['id_header_transaksi' => $header_transaksi->id_header_transaksi,
                'status_bayar'  => 'Konfirmasi',
                'jumlah_bayar'  => $i->post('jumlah_bayar'),
                'rekening_pembayaran'  => $i->post('rekening_pembayaran'),
                'rekening_pelanggan'  => $i->post('rekening_pelanggan'),
                // 'gambar' => $upload_gambar['upload_data']['file_name'],
                'id_rekening'  => $i->post('id_rekening'),
                'tanggal_bayar'  => $i->post('tanggal_bayar'),
                'nama_bank'  => $i->post('nama_bank'),

                ];

            $this->header_transaksi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil dilakukan');
            redirect(base_url('dashboard'), 'refresh');
            }
            }
            //END DATA MASUK KE DATABASE
            $data = ['titel' => 'Konfirmasi Pembayaran',
                            'header_transaksi' => $header_transaksi,
                            'rekening' => $rekening,
                            'isi'   => 'dashboard/konfirmasi'
                            ];
            $this->load->view('layout/wrapper',$data, false);

    }

}