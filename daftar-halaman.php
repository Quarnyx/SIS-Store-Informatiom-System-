<?php

switch ($_GET['page'] ?? '') {
    case '':
    case 'dashboard':
        include 'halaman/dashboard.php';
        break;
    case 'pengguna':
        include 'halaman/pengguna/index.php';
        break;
    case 'supplier':
        include 'halaman/supplier/index.php';
        break;
    case 'barang':
        include 'halaman/barang/index.php';
        break;
    case 'akun':
        include 'halaman/akun/index.php';
        break;
    case 'pembelian':
        include 'halaman/pembelian/index.php';
        break;
    case 'penjualan':
        include 'halaman/penjualan/index.php';
        break;
    case 'jurnal':
        include 'halaman/jurnal/index.php';
        break;
    case 'laporan-penjualan':
        include 'halaman/laporan-penjualan/index.php';
        break;
    case 'laporan-pembelian':
        include 'halaman/laporan-pembelian/index.php';
        break;
    case 'laporan-persediaan':
        include 'halaman/laporan-persediaan/index.php';
        break;
    case 'laporan-supplier':
        include 'halaman/laporan-supplier/index.php';
        break;
    default:
        include 'halaman/dashboard.php';
        break;
}