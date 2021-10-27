  <?php
                    //error upload
                    if(isset($error)) {
                        echo '<p class="alert alert-warning">'. $error. '</p>';
                    }
                    //notif error
                    echo validation_errors('<p class="alert alert-warning">','</p>');

                    //form open
                    echo form_open_multipart(base_url('dashboard/konfirmasi/' .$header_transaksi->kode_transaksi));
                ?> -->
                <!-- <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="30%">Pembayaran ke rekening</td>
                            <td>
                            <select nama="id_rekening" class="form-control">
                            <?php foreach($rekening as $rekening) { ?>
                            <option value="<?php echo $rekening->id_rekening ?>">
                            <?php echo $rekening->nama_bank ?> (No. Rekening : <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
                            </option>
                            <?php } ?>
                            </select> 
                            </td> -->
                        <!-- </tr>
                            <tr>
                            <td>Tanggal Bayar</td>
                            <td>
                            <input type="text" name="tanggal_bayar" class="form-control" placeholder="dd-mm-yyyy" value="<?php 
                            if(isset($_POST['tanggal_bayar'])) { 
                            echo set_value('tanggal_bayar'); 
                            } else {
                            echo date('d-m-Y'); } ?>">
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td>Jumlah Pembayaran</td>
                            <td>
                            <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); } else { echo $header_transaksi->jumlah_transaksi;} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Dari BANK</td>
                            <td>
                            <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo set_value('Nama_bank') ?>">
                            <small class="text-danger"> contoh: BANK MANDIRI </small>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td>Dari Nomor Rekening</td>
                            <td>
                            <input type="text" name="rekening_pembayaran" class="form-control" placeholder="Nomor Rekening" value="<?php echo set_value('rekening_pembayaran') ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pemilik Rekening</td>
                            <td>
                            <input type="text" name="rekening_pelanggan" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('rekening_pelanggan') ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Upload Bukti Bayar</td>
                            <td>
                            <input type="file" name="bukti_bayar" class="form-control-lg" placeholder="Upload Bukti Bayar" >
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <div class="btn-group">
                                <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-upload"></i> Submit </button>
                                <button class="btn btn-success" type="reset" name="reset"><i class="fa fa-times"></i> Reset </button>
                            </div>
                            </td>
                        </tr> -->
                    <!-- </tbody>
                </table>