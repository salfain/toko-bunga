<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header text-white bg-primary"><strong>Tambah Produk</strong></div>
        <div class="card-body">

            <form action="<?php echo site_url('product/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="Nama Produk">Nama Produk</label>
                        <input type="text" id="Nama Produk" name="nm_produk" class="form-control" placeholder="Nama Produk" required>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group"> <label for="Deskripsi">Deksripsi</label>
                        <input type="text" id="Deskripsi" name="Deskripsi" class="form-control" placeholder="Deskripsi" required>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group"> <label for="Harga">Harga</label>
                        <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-label-group"> <label for="Gambar">Gambar</label>
                            <input name="foto" type="file" placeholder="Gambar" required>

                        </div>
                    </div>

                    <a class="btn btn-primary btn-block">
                        <input type="submit" value="Simpan">
                        <input type="reset" value="Kembali"></a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="<?php echo site_url('product/list_product') ?>">
                    Lihat Produk</a>
            </div>
        </div>
    </div>
</div>