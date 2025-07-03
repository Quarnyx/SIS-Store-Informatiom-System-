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
                    <div id="stoklist">

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
    function loadStokList() {
        $('#stoklist').load('halaman/penjualan/stoklist.php');
    }
    $(document).ready(function () {

        $('#lihat-transaksi').on('click', function () {
            $('.modal').modal('show');
            $('.modal-title').html('History Transaksi');
            // load form
            $('.modal-body').load('halaman/penjualan/tabel-transaksi-penjualan.php');
        });
        loadTable();
        loadStokList();
        setTimeout(function () {
            new Selectr('.form-select');
        }, 2000);


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
                        loadStokList();
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