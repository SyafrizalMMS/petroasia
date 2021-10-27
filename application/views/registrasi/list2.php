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

    <?php if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-warning text-sm-center">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
} ?>
    <p class="alert alert-info text-sm-center">Sudah memiliki akun? Silahkan. <a href="<?php echo base_url('masuk'); ?>" class="btn btn-success"><i class="fa fa-key"></i> Login disini</a></p>
        <div class="col-md-12">
         <?php
        //display error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        //form open
        echo form_open(base_url('registrasi'), 'class="leave-comment"'); ?>
        <table class="table">
                <thead>
                <!-- class="thead-light"> -->
                    <tr>
                    <th>NAMA</th>
                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan'); ?>" required></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="email" name="email" class="form-control" placeholder="Isikan Alamat Email Anda" value="<?php echo set_value('email'); ?>" required> </td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="password" class="form-control" placeholder="Isikan Password Anda" value="<?php echo set_value('pwd'); ?>" required> </td>
                </tr>
                <tr>
                    <td>TELEPON</td>
                    <td><input type="text" name="telepon" class="form-control" placeholder="Isikan Nomor Telepon Anda" value="<?php echo set_value('telepon'); ?>" required> </td>
                </tr>
                <tr> 
                    <td>ALAMAT</td>
                    <td><textarea name="alamat" class="form-control" placeholder="Isikan Alamat Anda" required><?php echo set_value('alamat'); ?></textarea></td>
                </tr>
                <tr>
                <td></td>
                <td>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> SIMPAN</button>
                <button type="reset" class="btn btn-default btn-lg"><i class="fa fa-times"></i> RESET</button>
                </td>
                </tr>
                
            </tbody>
            <tfoot>
                
                
            </tfoot>
        </table>

    <?php echo form_close(); ?>
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