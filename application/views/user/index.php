<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-white bg-primary"><strong>Tambah Produk</strong></div>
            <div class="card-body">

                <form action="<?php echo site_url('User/upload') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="Nama Produk" name="nm_produk" class="form-control" placeholder="Nama Produk" required>
                            <label for="Nama Produk">Nama Produk</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="Deskripsi" name="Deskripsi" class="form-control" placeholder="Deskripsi" required>
                            <label for="Deskripsi">Deskripsi</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="harga" required>
                            <label for="harga">Harga</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-label-group">
                                <input name="foto" type="file" placeholder="Foto" required>
                                <label for="foto">Foto</label>
                            </div>
                        </div>

                        <a class="btn btn-primary btn-block">
                            <input type="submit" value="Simpan">
                            <input type="reset" value="Batal"></a>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="<?php echo site_url('User/lihat_produk') ?>">
                        Lihat Data Produk</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->