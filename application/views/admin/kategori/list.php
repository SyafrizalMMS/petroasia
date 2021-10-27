<p>
    <a href="<?= base_url('admin/kategori/tambah'); ?>" class="btn btn-success btn-lg">
    <i class="fa fa-plus"></i>  Tambah Baru </a>
</p>

<?php
//notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<p class ="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table class= "table table-bordered" id="example1">
    <thead>
		<tr>
            <th>NO</th>
            <th>NAMA</th>
			<th>SLUG</th>
            <th>URUTAN</th>
            <th>ACTION</th>
		</tr>
	</thead>
	<tbody>
        <?php $no = 1; foreach ($kategori as $kategori) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $kategori->nama_kategori; ?></td>
            <td><?php echo $kategori->slug_kategori; ?></td>
            <td><?php echo $kategori->urutan; ?></td>
            <td>
            <a href="<?= base_url('admin/kategori/edit/'.$kategori->id_kategori); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> EDIT </a>
            <a href="<?= base_url('admin/kategori/delete/'.$kategori->id_kategori); ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin data akan dihapus!')" ><i class="fa fa-trash-o"></i> HAPUS </a>

            </td>
		</tr>
        <?php } ?>
	</tbody>
</table>