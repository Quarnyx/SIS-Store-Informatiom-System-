<?php
include "../../config.php";
$sql = "SELECT * FROM barang WHERE id_barang = '$_POST[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_barang'] ?>">

    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" placeholder=""
                        value="<?= $row['kode_barang']; ?>" readonly>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Satuan Barang</label>
                    <select class="form-select" name="satuan">
                        <option value="PCS" <?php if ($row['satuan'] == 'PCS')
                            echo 'selected'; ?>>PCS</option>
                        <option value="BOX" <?php if ($row['satuan'] == 'BOX')
                            echo 'selected'; ?>>BOX</option>
                        <option value="BOTOL" <?php if ($row['satuan'] == 'BOTOL')
                            echo 'selected'; ?>>BOTOL</option>
                        <option value="LITER" <?php if ($row['satuan'] == 'LITER')
                            echo 'selected'; ?>>LITER</option>
                        <option value="BUAH" <?php if ($row['satuan'] == 'BUAH')
                            echo 'selected'; ?>>BUAH</option>
                    </select>
                    <input type="hidden" name="satuan_lama" value="<?= $row['satuan'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="nama" class="form-label">Name Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama" placeholder=""
                        value="<?= $row['nama_barang'] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="kondeskripsitak" placeholder=""
                        value="<?= $row['deskripsi'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="nama" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder=""
                        value="<?= number_format($row['harga_jual'], 0, '', '') ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="kontak" class="form-label">Harga Beli</label>
                    <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder=""
                        value="<?= number_format($row['harga_beli'], 0, '', '') ?>">
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
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'halaman/barang/proses-barang.php?aksi=edit-barang',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Edit Berhasil');

                } else {
                    alertify.error('Edit Gagal');

                }
            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>