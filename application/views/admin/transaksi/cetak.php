<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titel ?></title>
    <style type="text/css" media="print">
     body {
        font-family: arial;
        font-size: 12px;
    }
    table {
        border: solid thin #000;
        border-collapse: collapse;
    }
    td, th {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
    }
    th {
        background-color: #F5F5F5;
        font-weight: bold;
    }
    .cetak {
        width: 19cm;
        height: 27cm;
        padding: 1cm;  
    }
    h1 {
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
    }
    </style>
    <style type="text/css" media="screen">
     body {
        font-family: arial;
        font-size: 12px;
    }
    table {
        border: solid thin #000;
        border-collapse: collapse;
    }
    td, th {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
    }
    th {
        background-color: #F5F5F5;
        font-weight: bold;
    }
    .cetak {
        width: 19cm;
        height: 27cm;
        padding: 1cm;  
    }
    h1 {
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
    }
    </style>

</head>
<body onload="print()">
<div class="cetak">
<table  class="table table-bordered">
    <h1><?php echo $titel ?> <?php echo $site->namaweb ?></h1>
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
                <td>Pembayaran ke rekening</td>
                <td> :  <?php echo $header_transaksi->bank_admin ?> No. Rekening <?php echo $header_transaksi->nomor_rekening ?> a.n <?php echo
                $header_transaksi->nama_pemilik ?></td>
            </tr>
        </tbody>
    </table>
    <hr>

    <table class="table table-bordered">
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

</div>
    
</body>
</html>