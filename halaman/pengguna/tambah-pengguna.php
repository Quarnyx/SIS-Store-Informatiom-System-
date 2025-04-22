<form id="tambah-pengguna" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="selector">
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        new Selectr('#selector');

    })
    $("#tambah-pengguna").submit(function (e) {
        var formData = new FormData(this);

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "halaman/pengguna/proses-pengguna.php?aksi=tambah-pengguna",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Pengguna Berhasil Ditambah');

                } else {
                    alertify.error('Pengguna Gagal Ditambah');

                }
            }
        });
    });
</script>