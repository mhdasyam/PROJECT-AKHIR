<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pengguna</h4>
        </div>
        <form action="<?= base_url('admin/pengguna/simpan')?>" method="post">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                </div>
                <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama">
                </div>
                <div class="form-group col-md-6">
                    <label>Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control" id="floatingInput" placeholder="Nomor HP">
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                </div>
                <div class="form-group col-md-6"  id="floatingInput" placeholder="Level">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option selected="Admin">Admin</option>
                        <option selected="User">User</option>
                    </select>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>