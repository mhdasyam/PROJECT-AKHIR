<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="section-title">Kategori Konten</div>
            <a class="btn btn-primary" href="<?= base_url('admin/kategori/tambah') ?>">Tambah</a>
            <div class="section-title">Data Kategori</div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Kategori Konten</th>
                            <th scope="col">Foto Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $aa) { ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $aa['nama_kategori']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('assets/upload/kategori/' . $aa['foto_kategori']) ?>" target="_blank">
                                        <span class="fas fa-search"></span>Lihat Foto
                                    </a>
                                </td>
                                <td>
                                <a href="<?= base_url('admin/kategori/edit/'.$aa['foto_kategori'])?>"
                                            class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>

                                <a href="<?= base_url('admin/kategori/hapus/' . $aa['foto_kategori']) ?>"
                                        onClick="return confirm('Apakah anda yakin untuk menghapus data ini?')"
                                        class="btn btn-icon btn-danger m-2"><i class=" fas fa-trash"></i></a>
                                </td>
                            </tr>
                            </div>
                <?php $no++;
                        } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>