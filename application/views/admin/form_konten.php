<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="section-title">Tambah Konten</div>
            <a class="btn btn-primary" href="<?= base_url('admin/konten/tambah') ?>">Tambah</a>
            <div class="section-title">Data Konten</div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori Konten</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kreator</th>
                            <th scope="col">No Kreator</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($konten as $aa) { ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $aa['judul']; ?>
                                </td>
                                <td>
                                    <?= $aa['harga']; ?>
                                </td>
                                <td>
                                    <?= $aa['nama_kategori']; ?>
                                </td>
                                <td>
                                    <?= $aa['tanggal']; ?>
                                </td>
                                <td>
                                    <?= $aa['username']; ?>
                                </td>
                                <td>
                                    <?= $aa['no_hp']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('assets/upload/konten/' . $aa['foto']) ?>" target="_blank">
                                        <span class="fas fa-search"></span>Lihat Foto
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/konten/edit/' . $aa['foto']) ?>"
                                        class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>

                                        <a href="<?= base_url('admin/detail/detail_konten/' . $aa['id_konten']) ?>"
                                        class="btn btn-square btn-primary m-2"><i class="fa fa-image"></i></a>

                                    <a href="<?php echo site_url('admin/konten/hapus/' . $aa['foto']) ?>"
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