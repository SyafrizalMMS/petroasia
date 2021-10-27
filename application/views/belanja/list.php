<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/template/images/slider/slider3.png);">
		<h2 class="l-text2 t-center">
			<!-- <?php echo $titel; ?> -->
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
        <tr class="table-row bg-secondary" style="font-weight:bold; color:white"> 
            <td colspan="4" class="column-1"> Total Belanja </td>
            <td colspan="2" class="column-2"> Rp. <?php echo number_format($this->cart->total(), '0', ',', '.'); ?> </td> 
         </tr>
    </table>
    <br>
    <p class="pull-right">
        
            <a href="<?php echo base_url('belanja/hapus_semua'); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>
                HAPUS BELANJAAN
            </a>

            <a href="<?php echo ('belanja/checkout'); ?>" class="btn btn-warning"><i class="fa fa-shopping-cart"></i>
                CHECK OUT
            </a>
   
    </p>
</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
    
</div>

<div class="size10 trans-0-4 m-t-10 m-b-10 white">
   
</div>
</div>

</div>
</section>