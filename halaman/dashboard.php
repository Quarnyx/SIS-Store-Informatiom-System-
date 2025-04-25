<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Dashboard</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="row">
                <div class="col-md-6">
                    <div class="card  bg-welcome-img overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <h3 class="text-white fw-semibold fs-20 lh-base">Selamat datang di
                                    <br>Store Information System
                                </h3>
                                <a href="#" class="btn btn-sm btn-danger"><?= $_SESSION['username'] ?></a>
                                <img src="assets/images/extra/fund.png" alt="" class=" mb-n4 float-end" height="107">
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <?php
                require_once 'config.php';
                ?>
                <div class="col-md-6">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">Saldo</span>

                                </div>
                                <?php
                                $sql = "SELECT sum(debit) - sum(kredit) AS saldo FROM jurnal WHERE id_akun = 4";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                ?>
                                <h4 class="my-2 fs-24 fw-semibold">Rp <?php echo number_format($row['saldo'], 2); ?>
                                </h4>
                                <p class="mb-3 text-muted fw-semibold">
                                    Saldo akun kas yang tersedia
                                </p>
                                <a href="?page=jurnal" class="btn btn-soft-primary">Lihat Jurnal</a>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
        <div class="col-lg-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Pendapatan
                                    </p>
                                    <?php
                                    require_once 'config.php';
                                    $sql = "SELECT sum(kredit) AS pendapatan FROM jurnal WHERE id_akun = 5 AND MONTH(tanggal_transaksi) = MONTH(CURDATE()) AND YEAR(tanggal_transaksi) = YEAR(CURDATE()) ";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h4 class="mt-1 mb-0 fw-medium">Rp
                                        <?php echo number_format($row['pendapatan'], 2); ?>
                                    </h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Transaksi Penjualan</p>
                                    <?php
                                    $sql = "SELECT count(kode_penjualan) AS penjualan FROM penjualan WHERE MONTH(tanggal_transaksi) = MONTH(CURDATE()) AND YEAR(tanggal_transaksi) = YEAR(CURDATE())";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();

                                    ?>
                                    <h4 class="mt-1 mb-0 fw-medium"><?php echo $row['penjualan']; ?></h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-info rounded mx-auto">
                                        <i class="iconoir-cart fs-22 align-self-center mb-0 text-info"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Jumlah Barang</p>
                                    <?php
                                    $sql = "SELECT count(kode_barang) AS barang FROM barang";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h4 class="mt-1 mb-0 fw-medium"><?php echo $row['barang']; ?></h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                        <i
                                            class="iconoir-percentage-circle fs-22 align-self-center mb-0 text-warning"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Rata-rata Pendapatan</p>
                                    <?php
                                    $sql = "SELECT avg(kredit) AS pendapatan FROM jurnal WHERE id_akun = 5 AND MONTH(tanggal_transaksi) = MONTH(CURDATE()) AND YEAR(tanggal_transaksi) = YEAR(CURDATE()) ";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h4 class="mt-1 mb-0 fw-medium"><?php echo number_format($row['pendapatan'], 2); ?>
                                    </h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                        <i class="iconoir-hexagon-dice fs-22 align-self-center mb-0 text-danger"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div><!--end col-->
            </div>
            <!--end row-->
        </div><!--end col-->

    </div><!--end row-->

    <div class="row justify-content-center">

        <div class="col-md-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Report</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div id="reports" class="apex-charts pill-bar"></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Stok Barang</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM stok ORDER BY stok ASC LIMIT 5";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['nama_barang'] . "</td>";
                                    echo "<td>" . $row['stok'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table> <!--end table-->
                    </div><!--end /div-->
                    <hr class="hr-dashed">

                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

</div>
<?php
$sqljual = "SELECT
                YEAR(tanggal_transaksi) AS year,
                MONTH(tanggal_transaksi) AS month,
                COUNT(*) AS sales_count
            FROM
	            v_keranjang
                WHERE YEAR(tanggal_transaksi) = YEAR(CURDATE())
            GROUP BY year, month";
$sqlbeli = "SELECT
                YEAR(tanggal_masuk) AS year,
                MONTH(tanggal_masuk) AS month,
                COUNT(*) AS buys_count
            FROM
	            v_pembelian
                WHERE YEAR(tanggal_masuk) = YEAR(CURDATE())
            GROUP BY year, month";

$sales_result = $conn->query($sqljual);
$sales_data = [];

if ($sales_result->num_rows > 0) {
    while ($row = $sales_result->fetch_assoc()) {
        $sales_data[] = $row;
    }
}

$buys_result = $conn->query($sqlbeli);
$buys_data = [];

if ($buys_result->num_rows > 0) {
    while ($row = $buys_result->fetch_assoc()) {
        $buys_data[] = $row;
    }
}

// Preparing data for ApexCharts
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$sales_counts = array_fill(0, 12, 0);  // Initialize an array with 12 zeros
$buys_counts = array_fill(0, 12, 0);   // Initialize an array with 12 zeros

// Map buys data to corresponding months
foreach ($buys_data as $data) {
    $buys_counts[$data['month'] - 1] = $data['buys_count'];
}
// echo "<pre>";
// print_r($buys_counts);
// echo "</pre>";
// Map sales data to corresponding months
foreach ($sales_data as $data) {
    $sales_counts[$data['month'] - 1] = $data['sales_count'];
}
// echo "<pre>";
// print_r($sales_counts);
// echo "</pre>";



$conn->close();
?>
<script>
    const salesCounts = <?php echo json_encode($sales_counts); ?>;
    const buysCounts = <?php echo json_encode($buys_counts); ?>;
    const months = <?php echo json_encode($months); ?>;
    var chart = {
        series: [
            {
                name: "Pendapatan",
                data: salesCounts
            },
            {
                name: "Pembelian",
                data: buysCounts
            },
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 370,
            stacked: true,
            offsetX: -15,
        },
        colors: ["var(--bs-success)", "rgba(155, 171, 187, .25)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "80%",
                columnWidth: "20%",
                borderRadius: [3],
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            show: true,
            strokeDashArray: 3,
            padding: {
                top: 0,
                bottom: 0,
                right: 0,
            },
            borderColor: "rgba(0,0,0,0.05)",
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
        yaxis: {
            min: -5,
            max: 5,
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            categories: months,
        },
        yaxis: {
            tickAApprox: 4,
            labels: {
                show: true,
                formatter: function (val) {
                    return val + " Transaksi";
                }
            }
        },
    };

    var chart = new ApexCharts(
        document.querySelector("#reports"),
        chart
    );
    chart.render();
</script>