<div class="row d-print-none">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Laporan Persediaan</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="row d-print-none">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Filter Tanggal</h5>
            </div><!-- end card header -->
            <?php
            function tanggal($tanggal)
            {
                $bulan = array(
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $split = explode('-', $tanggal);
                return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
            }
            $daritanggal = "";
            $sampaitanggal = "";

            if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) {
                $daritanggal = $_GET['dari_tanggal'];
                $sampaitanggal = $_GET['sampai_tanggal'];
            }

            ?>
            <div class="card-body">
                <form action="" method="get" class="row g-3">
                    <input type="hidden" name="page" value="laporan-persediaan">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault01" required=""
                            name="dari_tanggal">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault02" required=""
                            name="sampai_tanggal">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Supplier</label>
                        <select name="id_supplier" class="form-select">
                            <option value="Semua">Semua Supplier</option>
                            <?php
                            require_once 'config.php';

                            $data = $conn->query("SELECT * FROM supplier");
                            while ($d = $data->fetch_array()) {
                                ?>
                                <option value="<?= $d['id_supplier'] ?>"><?= $d['nama_supplier'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Pilih</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<!-- end row-->
<?php if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="text-center mt-3 mb-3"><b>TOKO </b><br><b>LAPORAN Persediaan</b><br>
                    <hr style="border: 1px solid black;">
                    Periode <?php
                    if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                        echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                    } else {
                        echo "Semua";
                    }
                    ?>
                </h4>
                <div class="card-body">


                    <table id="tabel-data" class="table table-bordered table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle;">No</th>
                                <th class="text-center" style="vertical-align: middle;">Kode Produk</th>
                                <th class="text-center" style="vertical-align: middle;">Nama Produk</th>
                                <th class="text-center" style="vertical-align: middle;">Supplier</th>
                                <th class="text-center" style="vertical-align: middle;">Stok Awal</th>
                                <th class="text-center" style="vertical-align: middle;">Stok Masuk</th>
                                <th class="text-center" style="vertical-align: middle;">Stok Keluar</th>
                                <th class="text-center" style="vertical-align: middle;">Stok Akhir</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $kondisi = "";
                            $daritanggal = $_GET['dari_tanggal'];
                            $sampaitanggal = $_GET['sampai_tanggal'];
                            include "config.php";
                            if (isset($_GET['id_supplier']) && $_GET['id_supplier'] != "Semua") {
                                $supp = "WHERE pembelian.id_supplier = '$_GET[id_supplier]'";
                            } else {
                                $supp = "";
                            }
                            $query = mysqli_query($conn, "SELECT
                                        pembelian.*, 
                                        supplier.nama_supplier, 
                                        barang.nama_barang, 
                                        barang.kode_barang
                                    FROM
                                        pembelian
                                        INNER JOIN
                                        supplier
                                        ON 
                                            pembelian.id_supplier = supplier.id_supplier
                                        INNER JOIN
                                        barang
                                        ON 
                                            pembelian.id_barang = barang.id_barang $supp");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $data['kode_barang'] ?></td>
                                    <td><?= $data['nama_barang'] ?></td>
                                    <td><?= $data['nama_supplier'] ?></td>
                                    <td>
                                        <?php
                                        // stok awal
                                        // hitung stok keluar
                                        $sqlout = "SELECT SUM(qty) AS qty FROM keranjang WHERE id_barang = '$data[id_barang]' AND tanggal_transaksi < '$daritanggal'";
                                        $resultout = $conn->query($sqlout);
                                        $dataout = mysqli_fetch_array($resultout);
                                        if ($dataout['qty'] == null) {
                                            $dataout['qty'] = 0;
                                        }
                                        // hitung stok masuk
                                        $initsqlin = "SELECT SUM(jumlah) AS qty FROM pembelian WHERE id_barang = '$data[id_barang]' AND tanggal_masuk < '$daritanggal'";
                                        $initresultin = $conn->query($initsqlin);
                                        $initdatain = mysqli_fetch_array($initresultin);
                                        if ($initdatain['qty'] == null) {
                                            $initdatain['qty'] = 0;
                                        }
                                        $stokawal = $initdatain['qty'] - $dataout['qty'];
                                        echo $stokawal;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        // stok masuk
                                        $initsqlin = "SELECT SUM(jumlah) AS qty FROM pembelian WHERE id_barang = '$data[id_barang]' AND tanggal_masuk BETWEEN '$daritanggal' AND '$sampaitanggal'";
                                        $initresultin = $conn->query($initsqlin);
                                        $initdatain = mysqli_fetch_array($initresultin);
                                        if ($initdatain['qty'] == null) {
                                            $initdatain['qty'] = 0;
                                        }
                                        echo $initdatain['qty'];
                                        ?>


                                    </td>
                                    <td>
                                        <?php
                                        // stok keluar
                                        $sqlout = "SELECT SUM(qty) AS qty FROM keranjang WHERE id_barang = '$data[id_barang]' AND tanggal_transaksi BETWEEN '$daritanggal' AND '$sampaitanggal'";
                                        $resultout = $conn->query($sqlout);
                                        $dataout = mysqli_fetch_array($resultout);
                                        if ($dataout['qty'] == null) {
                                            $dataout['qty'] = 0;
                                        }
                                        echo $dataout['qty'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $stokawal + $initdatain['qty'] - $dataout['qty'];
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="mt-3" style="text-align:end;">
                        <hr>
                        <p class="font-weight-bold">Kendal, <?= tanggal(date('Y-m-d')) ?><br>Mengetahui,</p>
                        <div class="mt-5">
                            <p class="font-weight-bold">Pemilik</p>
                        </div>
                    </div>
                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                </div> <!-- end card body-->

            </div> <!-- end card -->

        </div><!-- end col-->
    </div>
    <!-- end row-->
<?php }
?>

<script>
</script>