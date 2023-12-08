<div class="col-12 col-md-6 col-lg-12">
    <?php foreach ($caraousel as $aa) { ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit Caraousel</h4>
            </div>
            <form action="<?= base_url('admin/caraousel/update') ?>" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="nama_foto" value="<?= $aa['foto']; ?>">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" id="floatingInput" placeholder="Judul"
                                value="<?= $aa['judul'] ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" id="floatingInput"
                                accept="image/png, image/jpeg">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </div>
</div>