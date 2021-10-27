<table  class="table table-bordered">
        <thead>
        <tr>
            <th width ="20%">NAMA PELANGGAN</th>
            <th> :  <?php echo $header_transaksi->nama_pelanggan ?></th>
        </tr>
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
                <td> : Rp. <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
            </tr>
            <tr>
                <td>Status Bayar</td>
                <td> :  <?php echo $header_transaksi->status_bayar ?></td>
            </tr>
            <tr>
                <td>Bukti Bayar</td>
                <td> <?php if($header_transaksi->bukti_bayar =="") {echo 'Belum ada';} else { ?><img src="<?php echo base_url('assets/upload/image/bukti_bayar/' .$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Bayar</td>
                <td> :  <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar)) ?></td>
            </tr>
            <tr>
                <td>Jumlah Bayar</td>
                <td> : Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?></td>
            </tr>
            <tr>
                <td>Pembayaran Dari</td>
                <td> :  <?php echo $header_transaksi->nama_bank ?> No. Rekening <?php echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?></td>
            </tr>
            <tr>
                <td>Pembayaran Ke</td>
                <td> :  <?php echo $header_transaksi->bank_admin ?> No. Rekening <?php echo $header_transaksi->nomor_rekening ?> a.n <?php echo
                $header_transaksi->nama_pemilik ?></td>
            </tr>
        </tbody>
    </table>
    <hr>

    <div class="card-body">
    <table id="example1" class="table table-bordered">
    <thead class="text-center bg-info">
        <tr>
            <th>No</th>
            <th>KODE</th>
            <th>NAMA PRODUK</th>
            <th class="text-center">JUMLAH</th>
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