<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Konten</h4>
        </div>
        <form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype='multipart/form-data'>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" id="floatingInput" placeholder="Judul">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" id="floatingInput" placeholder="Harga">
                    </div>
                    <div class="form-group col-md-12">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                            <?php foreach ($kategori as $aa) { ?>
                                <option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori']   ?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="floatingInput"
                            placeholder="Tambah Keterangan"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" id="floatingInput"
                            accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
    </div>
</div>
</div>