<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Kategori</h4>
        </div>
        <form action="<?= base_url('admin/kategori/simpan')?>" method="post" enctype='multipart/form-data'>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" id="floatingInput" placeholder="Nama Kategori">
                </div>
                <div class="form-group col-md-12">
                        <label>Foto Kategori</label>
                        <input type="file" name="foto_kategori" class="form-control" id="floatingInput"
                            accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>