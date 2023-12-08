<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Gambar Detail <?php echo $konten->judul ?></h4>
        </div>
        <form action="<?= base_url('admin/detail/simpan') ?>" method="post" enctype='multipart/form-data'>

        <input type="hidden" name='id_konten' value="<?php echo $konten->id_konten ?>">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Judul</label>
                        <input type="text" name="judul_detail" class="form-control" placeholder="Judul" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Foto</label>
                        <input type="file" name="foto_detail" class="form-control"required
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
                <?php foreach ($detail as $aa) { ?>
                    <div class="col-12 col-md-6 col-lg-3 m-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="<?= base_url('assets/upload/detail/' . $aa['foto_detail']) ?>"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $aa['judul_detail'] ?>
                                </h5>

                                <a href="<?php echo site_url('admin/detail/hapus/' . $aa['foto_detail'] . '/' . $aa['id_konten']); ?>"
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