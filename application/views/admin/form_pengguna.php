<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="section-title">Tambah Pengguna</div>
            <a class="btn btn-primary" href="<?= base_url('admin/pengguna/tambah') ?>">Tambah</a>
            <div class="section-title">Data Pengguna</div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $aa) { ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $aa['username']; ?>
                                </td>
                                <td>
                                    <?= $aa['nama']; ?>
                                </td>
                                <td>
                                    <?= $aa['no_hp']; ?>
                                </td>
                                <td>
                                    <?= $aa['level']; ?>
                                </td>

                                <td>
                                <a href="<?= base_url('admin/pengguna/edit/'.$aa['id_user'])?>"
                                            class="btn btn-square btn-warning m-2"><i class="fa fa-edit"></i></a>

                                    <a href="<?= base_url('admin/pengguna/hapus/' . $aa['id_user']) ?>"
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