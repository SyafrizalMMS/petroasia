<table id="example1" class="table table-bordered">
                    <thead class="text-center bg-info">
                      <tr>
                          <th>No</th>
                          <th>PELANGGAN</th>
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
                            <td><?php echo $header_transaksi->nama_pelanggan ?>
                            <br><small>
                            Telepon: <?php echo $header_transaksi->telepon ?>
                            <br>Email: <?php echo $header_transaksi->email ?>
                            <br>Alamat Kirim: <br><?php echo nl2br($header_transaksi->alamat) ?>
                            </small>

                            </td>
                            <td><?php echo $header_transaksi->kode_transaksi ?></td>
                            <td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            <td class="text-center"><?php echo $header_transaksi->total_item ?></td>
                            <td><?php echo $header_transaksi->status_bayar ?></td>
                            <td>
								<div class="btn-group">
                                <a href="<?php echo base_url('admin/transaksi/detail/' .$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
								<a href="<?php echo base_url('admin/transaksi/cetak/' .$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
                                <a href="<?php echo base_url('admin/transaksi/status/' .$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Update Status</a>
								</div>
                            </td>                        
                            
                        </tr>    
                        <?php $i++; } ?>
                    </tbody>
                    </table>