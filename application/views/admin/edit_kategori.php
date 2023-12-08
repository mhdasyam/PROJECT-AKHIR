<div class="col-12 col-md-6 col-lg-12">
<?php foreach ($kategori as $aa) { ?>
    <div class="card">
        <div class="card-header">
            <h4>Perbarui Kategori</h4>
        </div>
        <form action="<?= base_url('admin/kategori/update')?>" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nama Kategori Konten</label>
                    <input type="text" name="nama_kategori" class="form-control" id="floatingInput" placeholder="Nama" value="<?= $aa['nama_kategori'] ?>">
                </div>
                <div class="form-group col-md-12">
                        <label>Foto Kategori</label>
                        <input type="file" name="foto_kategori" class="form-control" id="floatingInput" placeholder="Foto Kategori"
                            accept="image/png, image/jpeg">
                    </div>
                <input type="hidden" name="nama_foto" value="<?= $aa['foto_kategori']; ?>">
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" >Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>