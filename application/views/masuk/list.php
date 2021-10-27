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
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fa fa-check"></i> Sukses!</h5>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
} ?>
    <p class="alert alert-info text-sm-center">Belum memiliki akun? Silahkan. <a href="<?php echo base_url('registrasi'); ?>" class="btn btn-success"><i class="fa fa-key"></i> Registrasi disini</a></p>
        <div class="col-md-12">
         <?php
        //display error
        echo validation_errors('<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-ban"></i> Alert!</h5>', '</div>');
        //display notifikasi error login
        if ($this->session->flashdata('warning')) {
            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-exclamation-triangle"></i> Alert!</h5>';
            echo $this->session->flashdata('warning');
            echo '</div>';
        }
        //display notifikasi sukses logout
        if ($this->session->flashdata('logout')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check"></i> Sukses!</h5>';
            echo $this->session->flashdata('logout');
            echo '</div>';
        }

        //form open
        echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>
        <table class="table">
                
            <tbody>
                <tr>
                    <td width="20%">EMAIL (Username)</td>
                    <td><input type="email" name="email" class="form-control" placeholder="Isikan Alamat Email Anda" value="<?php echo set_value('email'); ?>" required> </td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="password" class="form-control" placeholder="Isikan Password Anda" value="<?php echo set_value('password'); ?>" required> </td>
                </tr>
                
                <tr>
                <td></td>
                <td>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> LOGIN</button>
                <!-- <button type="reset" class="btn btn-default btn-lg"><i class="fa fa-times"></i> RESET</button> -->
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