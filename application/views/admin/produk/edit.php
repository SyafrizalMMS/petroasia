<?php
//error upload -->
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

//notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div');

//form open
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk), ' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-8">
        <input type="text" name="nama_produk" class="form-control"  placeholder="Nama Produk" value="<?php echo $produk->nama_produk; ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kode Produk</label>
    <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control"  placeholder="Kode Produk" value="<?php echo $produk->kode_produk; ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kategori Produk</label>
    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
        <?php foreach ($kategori as $kategori) { ?>
            <!-- <option value="<?php echo $kategori->id_kategori; ?>"></option>  -->
            <option value="<?php echo $kategori->id_kategori; ?>>" <?php if ($produk->id_kategori == $kategori->id_kategori) {
    echo 'selected';
}?>> 
            <?php echo $kategori->nama_kategori; ?></option>
        <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Harga Produk</label>
    <div class="col-md-5">
        <input type="number" name="harga" class="form-control"  placeholder="Harga Produk" value="<?php echo $produk->harga; ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Stok Produk</label>
    <div class="col-md-5">
    <input type="number" name="stok" class="form-control"  placeholder="Stok Produk" value="<?php echo $produk->stok; ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Berat Produk</label>
    <div class="col-md-5">
    <input type="text" name="berat" class="form-control"  placeholder="Berat Produk" value="<?php echo $produk->berat; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Ukuran Produk</label>
    <div class="col-md-5">
    <input type="text" name="ukuran" class="form-control"  placeholder="Ukuran Berat Produk" value="<?php echo $produk->ukuran; ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keterangan Produk</label>
    <div class="col-md-8">
    <textarea name="keterangan" class="form-control"  placeholder="Keterangan Produk" id="editor"> <?php echo $produk->keterangan; ?> </textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keywords (untuk SEO google)</label>
    <div class="col-md-8">
    <textarea name="keywords" class="form-control"  placeholder="Keywords (untuk SEO google)" ><?php echo $produk->keywords; ?> </textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar Produk</label>
    <div class="col-md-5">
    <input type="file" name="gambar" class="form-control" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Produk</label>
    <div class="col-md-5">
    <select name="status_produk" class="form-control">
    <option value="Publish">Publikasikan</option>
    <option value="Draft" <?php if ($produk->status_produk == 'Draft') {
    echo 'selected';
} ?> >Simpan Sebagai Draft</option>
    </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>  SIMPAN
    </button>
    <button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>  RESET
    </button>
</div>

<?php echo form_close(); ?>