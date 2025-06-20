<button class="btn btn-primary mb-4" id="lihat-transaksi"><i class="mdi mdi-eye"></i> Lihat Transaksi</button>

<!-- end row-->
<?php
require_once 'config.php';
$query = mysqli_query($conn, "SELECT MAX(kode_penjualan) AS kode_penjualan FROM penjualan");
$data = mysqli_fetch_array($query);
$max = $data['kode_penjualan'] ? substr($data['kode_penjualan'], 4, 3) : "000";
$no = $max + 1;
$char = "INV-";
$kode = $char . sprintf("%03s", $no);
?>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Kode Penjualan</h4>
                <h2><?php echo $kode ?></h2>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="keranjang" enctype="multipart/form-data">
                    <input type="hidden" name="kode_penjualan" value="<?= $kode ?>">
                    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Produk</label>
                                <select class="form-select select2" data-toggle="select2" id="barang" name="id_barang">
                                    <option value="">Pilih Produk</option>
                                    <?php
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
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual">
                                <input type="hidden" name="harga_beli">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Qty</label>
                                <input id="currentstock" type="hidden" name="currentstock" class="form-control"
                                    placeholder="Qty">
                                <input type="number" id="qty" name="qty" class="form-control" placeholder="Qty"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="tambah-barang" type="submit"
                                class="btn btn-success rounded-pill waves-effect waves-light mb-3"><i
                                    class="mdi mdi-plus"></i> Tambah Barang</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-6">
        <div id="load-table"></div>

    </div>
</div>
<?php
if (isset($_POST['hapus-penjualan'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM penjualan WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    $sql = "DELETE FROM keranjang WHERE kode_penjualan = '$_POST[kode_penjualan]'";
    $query = mysqli_query($conn, $sql);

    $sql = "DELETE FROM transaksi WHERE kode_transaksi = '$_POST[kode_penjualan]'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>window.location='index.php?halaman=penjualan'</script>";
    }
}
?>


<script>
    function loadTable() {
        var kode_penjualan = "<?php echo $kode; ?>";
        $('#load-table').load('halaman/penjualan/tabel-penjualan.php', { kode_penjualan: kode_penjualan })
    }
    $(document).ready(function () {
        new Selectr('.form-select');
        $('#lihat-transaksi').on('click', function () {
            $('.modal').modal('show');
            $('.modal-title').html('History Transaksi');
            // load form
            $('.modal-body').load('halaman/penjualan/tabel-transaksi-penjualan.php');
        });
        $('#pelanggan').on('change', function () {
            var alamat = $(this).find(':selected').data('alamat');
            $('textarea[name=alamat]').val(alamat);
        });
        loadTable();
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

        $("#keranjang").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'halaman/penjualan/proses-penjualan.php?aksi=keranjang',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    var response = JSON.parse(data);
                    if (response.status == 'success') {
                        alertify.success(response.message);
                        $(".modal").modal('hide');
                        loadTable();
                    } if (response.status == 'error') {
                        alertify.error(response.message);
                    }
                },
                error: function (data) {
                    alertify.error('Gagal');
                }
            });
        });
    });
</script>