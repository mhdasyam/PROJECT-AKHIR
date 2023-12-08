<div class="col-12 col-md-6 col-lg-12">
<?php foreach ($konten as $aa) { ?>
    <div class="card">
        <div class="card-header">
            <h4>Edit Konten</h4>
        </div>
        <form action="<?= base_url('admin/konten/update')?>" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="nama_foto" value="<?= $aa['foto']; ?>">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" id="floatingInput" placeholder="Judul" value="<?= $aa['judul'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" id="floatingInput" placeholder="Harga" value="<?= $aa['harga'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <?php foreach ($kategori as $uu) { ?>
                            <option <?php if ($uu['id_kategori']==$aa['id_kategori']) {
                                echo "selected"; } ?>
                                value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="floatingInput" placeholder="Tambah Keterangan"><?= $aa['keterangan'] ?></textarea>
                </div>
                <div class="form-group col-md-12">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" id="floatingInput" placeholder="Foto"
                            accept="image/png, image/jpeg">
                    </div>

  
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" >Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>