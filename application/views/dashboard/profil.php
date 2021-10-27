<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/template/images/heading-pages-02.jpg)">
    <h2 class="l-text2 t-center">
        <?php echo $titel; ?>
    </h2>
    <p class="m-text13 t-center">
        <!-- <?php echo $site->namaweb; ?> | <?php echo $site->tagline; ?> -->
    </p>
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-3 p-b-30">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>						
                </div>
            </div>
        
            <div class="col-sm-10 col-md-10 col-lg-9 p-b-30">
                <div class="alert alert-success">
                    <h5><?php echo $titel ?> <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h5>
                </div>
                     <!-- <p >Berikut rincian detail produk belanja <?php echo $this->session->userdata('nama_pelanggan'); ?>:</p> -->
            <!-- </div> -->
        
        <?php 
        //notifikasi update profil 
        if ($this->session->flashdata('Notif_profil')) {
            echo '<div class="alert alert-warning">';
            echo $this->session->flashdata('Notif_profil');
            echo '</div>';
        }
        //display error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        //form open
        echo form_open(base_url('dashboard/profil'), 'class="leave-comment"'); ?>
        
        <table class="table">
                <thead>
                <tr>
                    <th width="25%">NAMA</th>
                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan; ?>" required></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="email" name="email" class="form-control" placeholder="Isikan Alamat Email Anda" value="<?php echo $pelanggan->email; ?>" readonly> </td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="password" class="form-control" placeholder="Isikan Password Anda" value="<?php echo set_value('password'); ?>"> 
                    <span class="text-danger m-t-143">  Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span></td>
                </tr>
                <tr>
                    <td>TELEPON</td>
                    <td><input type="text" name="telepon" class="form-control" placeholder="Isikan Nomor Telepon Anda" value="<?php echo $pelanggan->telepon; ?>" required> </td>
                </tr>
                <tr> 
                    <td>ALAMAT</td>
                    <td><textarea name="alamat" class="form-control" placeholder="Isikan Alamat Anda" required><?php echo $pelanggan->alamat; ?></textarea></td>
                </tr>
                <tr>
                <td></td>
                <td>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Update Profil</button>
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
</section>


