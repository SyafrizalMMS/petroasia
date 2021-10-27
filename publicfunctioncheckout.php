<?php

//check apakah pelanggan sudah login atau belum? jika belum maka harus registrasi
        //dan juga sekaligus login. Mengecek dengan session email.

        //kondisi sudah login
        if ($this->session->userdata('email')) {
            $email = $this->session->userdata('email');
            $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            $pelanggan = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

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

            if ($valid->run() === false) {
                // END VALIDASI
                $data = ['titel' => 'Check Out',
                      'keranjang' => $keranjang,
                      'pelanggan' => $pelanggan,
                      'isi' => 'belanja/checkout',
                    ];
                $this->load->view('layout/wrapper', $data, false);
            //masuk databas
            } else {
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
                //proses masuk ke tabel header_transaksi
                $this->header_transaksi_model->tambah($data);

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
                }
            }
            //setelah data masuk ke tabel transaksi, maka keranjang dikosongkan lagi
            $this->cart->destroy();
            //end destroy
            $this->session->set_flashdata('sukses', 'Check out berhasil');
            redirect(base_url('belanja/sukses'), 'refresh');
        //end masuk database
        } else {
            //kalau belum maka harus registrasi
            $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi dahulu');
            redirect(base_url('registrasi'), 'refresh');
        }
