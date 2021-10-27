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
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<?php include('menu.php') ?>						
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!-- Product -->
					<div class="row">
						<div class="alert alert-success">
                            <h5>Selamat Datang <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h5>
                        </div>
					</div>

					<?php 
                    //kalau ada transaksi, maka tampilkan tabel
                    if ($header_transaksi){
                    ?>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered">
                    <thead class="text-center bg-info">
                      <tr>
                          <th>No</th>
                          <th>KODE</th>
                          <th>TANGGAL</th>
                          <th>TOTAL</th>
                          <th>ITEM</th>
                          <th>STS BAYAR</th>
                          <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($header_transaksi as $header_transaksi) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $header_transaksi->kode_transaksi ?></td>
                            <td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            <td><?php echo $header_transaksi->total_item ?></td>
                            <td><?php echo $header_transaksi->status_bayar ?></td>
                            <td>
								<div class="btn-group">
                                <a href="<?php echo base_url('dashboard/detail/' .$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail
                                </a>
								<a href="<?php echo base_url('dashboard/konfirmasi/' .$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi
                                </a>
								</div>
                            </td>                        
                            
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