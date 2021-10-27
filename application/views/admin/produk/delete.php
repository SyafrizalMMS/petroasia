<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk; ?>">
    <i class="fa fa-trash-o"></i> HAPUS 
 
</button>

<div class="modal modal-danger fade" id="delete-<?php echo $produk->id_produk; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">PERHATIAN !</h4>
            </div>
                <div class="modal-body">
                <p class="text-center">Yakin ingin menghapus data ini! Data yang akan di hapus tidak dapat dikembalikan lagi</p>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <a href="<?php echo base_url('admin/produk/delete/'.$produk->id_produk); ?>" class="btn btn-outline"><i class="fa fa-trash-o"></i>  Ya, akan menghapus data ini</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>