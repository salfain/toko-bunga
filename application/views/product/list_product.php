<!-- DataTables Example -->
<div class="container-fluid">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Produk
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach ($produk as $u) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $u->nama_produk ?></td>
                            <td><?php echo $u->deskripsi ?></td>
                            <td><?php echo $u->harga ?></td>
                            <td><img src='<?= base_url() ?>assets/foto_bunga/<?= $u->gambar; ?>' width="100" height="100"></td>
                            <td><a href="<?= base_url(); ?>product/edit/<?= $u->id_produk ?>">Edit</a> ||
                                <a href="<?= base_url(); ?>product/hapus/<?= $u->id_produk ?>">delete</a>



                            </td>

                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Sticky Footer -->