<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Caraousel</h4>
        </div>
        <form action="<?= base_url('admin/caraousel/simpan') ?>" method="post" enctype='multipart/form-data'>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" id="floatingInput" placeholder="Judul">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" id="floatingInput"
                            accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </div>
    </div>

    <div class="card">

        <div class="container">
            <div class="row">
                <?php foreach ($caraousel as $aa) { ?>
                    <div class="col-12 col-md-6 col-lg-3 m-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $aa['judul'] ?>
                                </h5>
                                <a href="<?= base_url('admin/caraousel/edit/' . $aa['foto']) ?>"
                                    class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>

                                <a href="<?php echo site_url('admin/caraousel/hapus/' . $aa['foto']) ?>"
                                    onClick="return confirm('Apakah anda yakin untuk menghapus data ini?')"
                                    class="btn btn-icon btn-danger m-2"><i class=" fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


    </div>
</div>