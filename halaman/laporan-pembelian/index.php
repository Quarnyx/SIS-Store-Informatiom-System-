<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Laporan Pembelian</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<div class="row d-print-none">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Periode Tanggal</h5>
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
                    <input type="hidden" name="page" value="laporan-pembelian">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault01" required=""
                            name="dari_tanggal">
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault02" required=""
                            name="sampai_tanggal">
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
                <h4 class="text-center mt-3 mb-3"><b>TOKO</b><br><b>LAPORAN PEMBELIAN</b><br>
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
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "config.php";
                            $total = 0;
                            $harga_beli = 0;
                            $harga_jual = 0;
                            $query = mysqli_query($conn, "SELECT * FROM v_pembelian WHERE tanggal_masuk BETWEEN '$_GET[dari_tanggal]' AND '$_GET[sampai_tanggal]'");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?= $data['kode_pembelian'] ?></td>
                                    <td><?= $data['nama_barang'] ?></td>
                                    <td><?= $data['tanggal_masuk'] ?></td>
                                    <td>Rp. <?= number_format($data['harga_beli'], 0, ',', '.') ?></td>
                                    <td><?= $data['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($data['harga_beli'] * $data['jumlah'], 0, ',', '.') ?></td>

                                </tr>
                                <?php
                                $total += ($data['harga_beli'] * $data['jumlah']);
                            }
                            ?>
                            <tr>
                                <td colspan="4"></td>
                                <td>Total</td>
                                <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
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