<?php
require_once '../../config.php';
function tambahTransaksi($id_akun_debit, $id_akun_kredit, $total, $deskripsi, $tanggal_transaksi, $kode_transaksi, $conn)
{
    $sql = "INSERT INTO transaksi (id_akun_debit, id_akun_kredit, total, deskripsi, tanggal_transaksi, kode_transaksi) 
    VALUES ('$id_akun_debit', '$id_akun_kredit', '$total', '$deskripsi', '$tanggal_transaksi', '$kode_transaksi')";
    $result = $conn->query($sql);
    if ($result) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}
function hapusTransaksi($id, $conn)
{
    $sql = "DELETE FROM transaksi WHERE kode_transaksi = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo $conn->error;
    }
}
switch ($_GET['aksi']) {
    case 'keranjang':
        $id_barang = $_POST['id_barang'];
        $qty = $_POST['qty'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $tanggal_transaksi = date('Y-m-d');
        $id_pengguna = $_POST['id_pengguna'];
        $kode_penjualan = $_POST['kode_penjualan'];
        $total = $qty * $harga_jual;
        $sql = "INSERT INTO keranjang (id_barang, qty, harga_jual, harga_beli, kode_penjualan, tanggal_transaksi,total)
        VALUES ('$id_barang', '$qty', '$harga_jual', '$harga_beli', '$kode_penjualan', '$tanggal_transaksi', '$total')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data keranjang berhasil ditambahkan']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data keranjang gagal ditambahkan', 'error' => $conn->error]);
        }
        break;
    case 'hapus-keranjang':
        $id = $_POST['id'];
        $sql = "DELETE FROM keranjang WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data keranjang berhasil dihapus']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data keranjang gagal dihapus', 'error' => $conn->error]);
        }
        break;
    case 'tambah-penjualan':
        $akun_debit = 6; // id akun hpp
        $akun_kredit = 3; // id akun persediaan
        $total = $_POST['harga_beli'];
        $deskripsi = 'HPP dari penjualan ' . $_POST['kode_penjualan'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $kode_penjualan = $_POST['kode_penjualan'];

        tambahTransaksi($akun_debit, $akun_kredit, $total, $deskripsi, $tanggal_transaksi, $kode_penjualan, $conn);

        $akun_debit = 4; //akun kas
        $akun_kredit = 5; //akun pendapatan
        $total = $_POST['harga_jual'];
        $deskripsi = 'Penjualan dari kode ' . $_POST['kode_penjualan'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];

        tambahTransaksi($akun_debit, $akun_kredit, $total, $deskripsi, $tanggal_transaksi, $kode_penjualan, $conn);

        // simpan penjualan ke tabel penjualan
        $id_pengguna = $_POST['id_pengguna'];
        $total = preg_replace('/[^0-9]/', '', $_POST['total']);
        $sql = "INSERT INTO penjualan (id_pengguna, total, kode_penjualan, tanggal_transaksi) 
        VALUES ('$id_pengguna', '$total', '$kode_penjualan', '$tanggal_transaksi')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data penjualan berhasil ditambahkan']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data penjualan gagal ditambahkan', 'error' => $conn->error]);
        }
        //update detail penjualan
        $sql = "UPDATE keranjang SET tanggal_transaksi = '$tanggal_transaksi' WHERE kode_penjualan = '$kode_penjualan'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
        } else {
            http_response_code(500);
            echo $conn->error;
        }
        break;
}