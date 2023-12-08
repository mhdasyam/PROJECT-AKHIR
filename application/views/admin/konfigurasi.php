<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Konfigurasi</h4>
        </div>
        <form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Judul Website</label>
                        <input type="text" name="judul_website" class="form-control" placeholder="judul website" value="<?= $konfig->judul_website;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Profile Website</label>
                        <textarea name="profil_website" class="form-control"
                            placeholder="profil website"><?= $konfig->profil_website;?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" placeholder="instagram"  value="<?= $konfig->instagram ;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" placeholder="facebook" value="<?= $konfig->facebook ;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Youtube</label>
                        <input type="text" name="youtube" class="form-control" placeholder="youtube" value="<?= $konfig->youtube ;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email" value="<?= $konfig->email ;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="alamat" value="<?= $konfig->alamat ;?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nomor WhatsApp</label>
                        <input type="text" name="no_wa" class="form-control" placeholder="nomor whatsapp" value="<?= $konfig->no_wa ;?>">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
    </div>
</div>
</div>