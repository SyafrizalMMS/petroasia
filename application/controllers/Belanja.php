<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        //load helper random string
        $this->load->helper('string');
    }

    //Halaman belanja
    public function index()
    {
        $keranjang = $this->cart->contents();
        $data = ['titel' => 'Keranjang Belanja',
                      'keranjang' => $keranjang,
                      'isi' => 'belanja/list',
                    ];
        $this->load->view('layout/wrapper', $data, false);
    }

    public function checkout()
    {
        //check apakah pelanggan sudah login atau belum? jika belum maka harus registrasi
        //dan juga sekaligus login. Mengecek dengan session email.

        //kondisi sudah login
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

            $keranjang = $this->cart->contents();

            //validasi input
            $valid = $this->form_validation;

            $valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
                            ['required' => '%s harus diisi']);
            $valid->set_rules('telepon', 'Nomor Telepon', 'required',
                            ['required' => '%s harus diisi']);
            $valid->set_rules('alamat', 'Alamat', 'required',
                            ['required' => '%s harus diisi']);
            $valid->set_rules('email', 'Email', 'required|valid_email|',
                            ['required' => '%s harus diisi',
                            'valid_email' => '%s tidak valid',
                            ]);
        
            if ($valid->run() == false) {

                // END VALIDASI
                            
                $data = ['titel' => 'Check Out',
                'keranjang' => $keranjang,
                'pelanggan' => $pelanggan,
                'isi' => 'belanja/cekout',
                ];
                $this->load->view('layout/wrapper', $data);

            } else if ($valid->run() == true) { 
                    //proses masuk ke tabel header_transaksi
                        $i = $this->input;
                        $data = ['id_pelanggan' => $pelanggan->id_pelanggan,
                                    'nama_pelanggan' => $i->post('nama_pelanggan'),
                                    'email' => $i->post('email'),
                                    'telepon' => $i->post('telepon'),
                                    'alamat' => $i->post('alamat'),
                                    'kode_transaksi' => $i->post('kode_transaksi'),
                                    'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                                    'jumlah_transaksi' => $i->post('jumlah_transaksi'),
                                    'status_bayar' => 'Belum',
                                    'tanggal_post' => date('Y-m-d H:i:s'),
                                    ];
                        $this->header_transaksi_model->tambah($data);
                        //end proses masuk ke tabel header_transaksi
        
                        //proses masuk ketabel transaksi
                        foreach ($keranjang as $keranjang) {
                            $sub_total = $keranjang['price'] * $keranjang['qty'];
                            $data = ['id_pelanggan' => $pelanggan->id_pelanggan,
                                'kode_transaksi' => $i->post('kode_transaksi'),
                                'id_produk' => $keranjang['id'],
                                'harga' => $keranjang['price'],
                                'jumlah' => $keranjang['qty'],
                                'total_harga' => $sub_total,
                                'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                                ];
                            $this->transaksi_model->tambah($data);
                       
                        //end proses masuk ketabel transaksi
                        //setelah data masuk ke tabel transaksi, maka keranjang dikosongkan lagi
                        $this->cart->destroy();
                        //end destroy
                        $this->session->set_flashdata('sukses_cekout', 'Check out berhasil');
                        redirect(base_url('belanja/sukses'));
                        //end masuk database
                    }
                } 
        
        } else  {
        //kalau belum maka harus registrasi
        $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi dahulu');
        redirect(base_url('registrasi'), 'refresh');
        }
    } 


    public function bayar()
    {
        // if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

            $keranjang = $this->cart->contents();

            
        //proses masuk ke tabel header_transaksi
        $i = $this->input;
        $data = ['id_pelanggan' => $pelanggan->id_pelanggan,
                    'nama_pelanggan' => $i->post('nama_pelanggan'),
                    'email' => $i->post('email'),
                    'telepon' => $i->post('telepon'),
                    'alamat' => $i->post('alamat'),
                    'kode_transaksi' => $i->post('kode_transaksi'),
                    'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                    'jumlah_transaksi' => $i->post('jumlah_transaksi'),
                    'status_bayar' => 'Belum',
                    'tanggal_post' => date('Y-m-d H:i:s'),
                    ];
        $this->header_transaksi_model->tambah($data);
        //end proses masuk ke tabel header_transaksi

        //proses masuk ketabel transaksi
        foreach ($keranjang as $keranjang) {
            $sub_total = $keranjang['price'] * $keranjang['qty'];
            $data = ['id_pelanggan' => $pelanggan->id_pelanggan,
                'kode_transaksi' => $i->post('kode_transaksi'),
                'id_produk' => $keranjang['id'],
                'harga' => $keranjang['price'],
                'jumlah' => $keranjang['qty'],
                'total_harga' => $sub_total,
                'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                ];
            $this->transaksi_model->tambah($data);
        }
        //end proses masuk ketabel transaksi
        //setelah data masuk ke tabel transaksi, maka keranjang dikosongkan lagi
        $this->cart->destroy();
        //end destroy
        $this->session->set_flashdata('sukses_cekout', 'Check out berhasil');
        redirect(base_url('belanja/sukses'));
        //end masuk database
        }
    

    public function sukses()
    {
        $data = ['titel' => 'Belanja Berhasil',
                'isi' => 'belanja/sukses',
                ];
        $this->load->view('layout/wrapper', $data, false);
    }

    //tambahkan ke keranjang belanja
    public function add()
    {
        //ambil data dari form
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $redirect_page = $this->input->post('redirect_page');
        //proses memasukkan ke keranjang belanja
        $data = [
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
                ];
        $this->cart->insert($data);

        redirect($redirect_page, 'refresh');
    }

    public function update_cart($rowid)
    {
        //jika ada data pada rowid
        if ($rowid) {
            $data = ['rowid' => $rowid,
                        'qty' => $this->input->post('qty'),
                    ];
            $this->cart->update($data);
            $this->session->set_flashdata('sukses', 'Data belanja telah diupdate pada keranjang belanja anda');
            redirect(base_url('belanja'), 'refresh');
        } else {
            //maka jika tidak ada data pada rowid
            redirect(base_url('belanja'), 'refresh');
        }
    }

    //hapus keranjang belanja
    public function hapus($rowid = '')
    {
        //hapus per item
        $this->cart->remove($rowid);
        $this->session->set_flashdata('sukses', 'Daftar belanja per Item telah dihapus');
        redirect(base_url('belanja'), 'refresh');
    }

    public function hapus_semua()
    {
        //hapus semua
        $this->cart->destroy();
        $this->session->set_flashdata('sukses', 'Anda Telah Menghapus Semua Daftar Belanja, Pada Keranjang Belanja');
        redirect(base_url('belanja'), 'refresh');
    }

    // code...
}
