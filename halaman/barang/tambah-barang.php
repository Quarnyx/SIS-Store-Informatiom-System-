<form id="tambah-barang" enctype="multipart/form-data">
    <?php
    require_once '../../config.php';
    ?>

    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Satuan Barang</label>
                    <select class="form-select" name="satuan">
                        <option selected>Pilih Satuan</option>
                        <option value="PCS">PCS</option>
                        <option value="BOX">BOX</option>
                        <option value="BOTOL">BOTOL</option>
                        <option value="LITER">LITER</option>
                        <option value="BUAH">BUAH</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="nama" class="form-label">Name Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="kontak" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="nama" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="fototak">
            </div>
            <div class="col-md-6">
                <div>
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsitak" placeholder=""></textarea>
                </div>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>

    $("#harga_beli").on("keyup", function () {
        var value = $(this).val().replace(/[^\d]/g, "");
        $(this).val("Rp. " + value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    })

    $("#harga_jual").on("keyup", function () {
        var value = $(this).val().replace(/[^\d]/g, "");
        $(this).val("Rp. " + value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    })

    $("#tambah-barang").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);

        $.ajax({
            type: "POST",
            url: "halaman/barang/proses-barang.php?aksi=tambah-barang",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Barang Berhasil Ditambah');

                } else {
                    alertify.error('Barang Gagal Ditambah');

                }
            }
        });
    });
</script>