<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/template/images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			<?php echo $titel; ?>
		</h2>
</section>

	<!--Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container"> 
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">
            <!-- <h1><?php echo $titel; ?></h1><br>
            <div class="clearfix"></div>
            <br> -->

    <?php if ($this->session->flashdata('sukses_cekout')) {
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fa fa-check"></i> Sukses!</h5>';
    echo $this->session->flashdata('sukses_cekout');
    echo '</div>';
} ?>
    <p class="alert alert-info text-sm-center">Terima kasih, Barang yang sudah anda beli akan segera kami proses. 
    </p>
        
</div>
    
        
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