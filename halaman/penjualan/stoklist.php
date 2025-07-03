<div class="col-lg-12">
    <div class="mb-3">
        <label for="simpleinput" class="form-label">Produk</label>
        <select class="form-select select2" data-toggle="select2" id="barang" name="id_barang">
            <option value="">Pilih Produk</option>
            <?php
            include "../../config.php";
            $sql = "SELECT * FROM stok";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>

                <option value="<?= $row['id'] ?>" data-hargabeli="<?= $row['harga_beli'] ?>"
                    data-hargajual="<?= $row['harga_jual'] ?>" data-stock="<?= $row['stok'] ?>">
                    <?= $row['nama_barang'] ?> - Stok
                    <?= $row['stok'] ?>
                </option>
                <?php
            }

            ?>
        </select>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#barang').on('change', function () {
            var hargabeli = $(this).find(':selected').data('hargabeli');
            var hargajual = $(this).find(':selected').data('hargajual');
            var stock = $(this).find(':selected').data('stock');
            $('input[name=currentstock]').val(stock);
            $('input[name=harga_beli]').val(hargabeli);
            $('input[name=harga_jual]').val(hargajual);
        });

        // jika qty lebih besar dari currentstock
        $('#qty').on('input', function () {
            var currentstock = parseInt($('#currentstock').val());
            var qty = parseInt($('#qty').val());
            if (qty > currentstock) {
                alertify.error('Qty tidak boleh lebih besar dari stock');
                // $('#qty').val(currentstock);
                $('#tambah-barang').prop('disabled', true);
            } else {
                $('#tambah-barang').prop('disabled', false);
            }
        });
    });
</script>