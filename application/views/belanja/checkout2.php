<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/template/images/slider/slider3.png);">
		<h2 class="l-text2 t-center">
			<!-- <?php  echo $titel; ?> -->
		</h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
    <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <h1><?php echo $titel; ?></h1><br>
                <div class="clearfix"></div>
                <br>

            <?php if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-warning">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
} ?>

            <table class="table-shopping-cart">
            <tr class="table-head">
                <th class="column-1">GAMBAR</th>
                <th class="column-2">PPRODUK</th>
                <th class="column-3" width = "20%">HARGA</th>
                <th class="column-4 p-l-70" width = "-50%">JUMLAH</th>
                <th class="column-5" width = "12%">SUB TOTAL</th>
                <th class="column-6" width = "18%">ACTION</th>
            </tr>

            <?php
            //looping data keranjang belanja
            foreach ($keranjang as $keranjang) {
                //data produk
                $id_produk = $keranjang['id'];
                $produk = $this->produk_model->detail($id_produk);
                //form update keranjang belanja
                echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
                //hidden input
                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['id']);
                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['rowid']);
                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['name']);
                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['price']);
                // echo form_hidden('cart['.$keranjang['id'].']', $keranjang['qty']);?>

                <tr class="table-row">
                <td class="column-1">
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar); ?>" alt="<?php echo $keranjang['name']; ?>">
                    </div>
                </td>
                <td class="column-2"><?php echo $keranjang['name']; ?></td>
                <td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0', ',', '.'); ?></td>
                <td class="column-4">
                    <div class="flex-w bo5 of-hidden w-size17">
                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                    </button>

                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty']; ?>">

                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                </td>
                <td class="column-5">Rp. <?php
                $sub_total = $keranjang['qty'] * $keranjang['price'];
                echo number_format($keranjang['subtotal'], '0', ',', '.'); ?>
                </td>
                <td>
                    <button type = "submit" name="update" class="btn btn-success btn-sm">
                    <i class="fa fa-edit"></i> UPDATE 
                    </button>
                    <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']); ?>" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> HAPUS 
                    </a>
                </td>
                </tr>
                <?php
                //form close
                echo form_close();
                //end looping data keranjang belanja
            }
                ?>
                <tr class="table-row bg-success text-strong" style="font-weight:bold; color:white"> 
                    <td colspan="4" class="column-1"> Total Belanja </td>
                    <td colspan="2" class="column-2"> Rp. <?php echo number_format($this->cart->total(), '0', ',', '.'); ?> </td> 
                </tr>
                </table>
                <br>
    
                <?php
                    echo form_open(base_url('belanja/checkout'));
                    $kode_transaksi = date('d').strtoupper(random_string('alnum', 8).date('Ym'));
                ?>
                <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
                <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
                <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y=m-d'); ?>">

                <table class="table">
                <thead> 
                    <tr>
                        <th width="25%">Kode Transaksi</th>
                        <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi; ?>" readonly required></th>
                    </tr>
                    <tr>
                        <th width="25%">Nama Penerima</th>
                        <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan; ?>" required></th>
                    </tr>
                    <tr>
                        <td>Email Penerima</td>
                        <td><input type="email" name="email" class="form-control" placeholder="Isikan Alamat Email Anda" value="<?php echo $pelanggan->email; ?>" required> </td>
                    </tr>
                    <tr>
                        <td>Telepon Penerima</td>
                        <td><input type="text" name="telepon" class="form-control" placeholder="Isikan Nomor Telepon Anda" value="<?php echo $pelanggan->telepon; ?>" required> </td>
                    </tr>
                    <tr>
                        <td>Alamat Pengiriman</td>
                        <td><textarea name="alamat" class="form-control" placeholder="Isikan Alamat Anda" ><?php echo $pelanggan->alamat; ?></textarea></td>
                    </tr>
                    <tr> <td></td>
                    <td>
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-shopping-cart" ></i> Check Out Sekarang</button>
                        <button type="reset" class="btn btn-default btn-lg"><i class="fa fa-times"></i> RESET</button>
                    </td>
                    </tr>
                    </thead>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>