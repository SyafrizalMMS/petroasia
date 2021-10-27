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
                     <p >Berikut rincian detail produk belanja <?php echo $this->session->userdata('nama_pelanggan'); ?>:</p>
                    <?php 
                    //kalau ada transaksi, maka tampilkan tabel
                    if ($header_transaksi){
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width ="20%">KODE TRANSAKSI</th>
                                <th> :  <?php echo $header_transaksi->kode_transaksi ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tanggal</td>
                                <td> :  <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Transaksi</td>
                                <td> : <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            </tr>
                            <tr>
                                <td>Status Bayar</td>
                                <td> :  <?php echo $header_transaksi->status_bayar ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-body">
                    <table class="table table-bordered">
                    <thead class="text-center bg-info">
                      <tr>
                          <th>No</th>
                          <th>KODE</th>
                          <th>NAMA PRODUK</th>
                          <th>JUMLAH</th>
                          <th>HARGA</th>
                          <th>TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($transaksi as $transaksi) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $transaksi->kode_produk ?></td>
                            <td><?php echo $transaksi->nama_produk ?></td>
                            <td class="text-center"><?php echo number_format($transaksi->jumlah) ?></td>
                            <td class="text-right"><?php echo number_format($transaksi->harga) ?></td>
                            <td class="text-right"><?php echo number_format($transaksi->total_harga) ?></td>
                        </tr>    
                        <?php $i++; } ?>
                    </tbody>
                    </table>

                    <?php
                        }else{ ?>
                        <p class="alert alert-success">
                        <i class='fa fa-warning'></i>Belum Ada Data Transaksi
                        </p>
                    <?php }?>
            </div>
         
        </div>
    </div>
</section>


