<div class="col-12 col-md-6 col-lg-12">
<?php foreach ($user as $aa) { ?>
    <div class="card">
        <div class="card-header">
        <input name="id_user" type="hidden" value="<?= $aa['id_user']?>">
            <h4>Edit Pengguna</h4>
        </div>
        <form action="<?= base_url('admin/pengguna/update')?>" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" value="<?= $aa['username'] ?>"readonly>
                </div>
                <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama" value="<?= $aa['nama'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control" id="floatingInput" placeholder="Nomor HP" value="<?= $aa['no_hp'] ?>">
                </div>
                <div class="form-group col-md-6"  id="floatingInput" placeholder="Level">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option  <?php if($aa['level']=='Admin'){echo "selected";}?> value="Admin">Admin</option>
                        <option  <?php if($aa['level']=='User'){echo "selected";}?> value="User">User</option>
                    </select>
                </div>
                <input type="hidden" name="id_user"  value="<?= $aa['id_user']; ?>">
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>