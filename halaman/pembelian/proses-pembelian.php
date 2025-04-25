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
    case 'tambah-pembelian':
        $id_akun_debit = $_POST['id_akun_debit'];
        $id_akun_kredit = $_POST['id_akun_kredit'];
        $id_barang = $_POST['id_barang'];
        $id_supplier = $_POST['id_supplier'];
        $kode_pembelian = $_POST['kode_pembelian'];
        $harga_beli = $_POST['harga_beli'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_beli = substr($harga_beli, 0, -2);
        $jumlah = $_POST['jumlah'];
        $total = $harga_beli * $jumlah;
        $deskripsi = 'Pembelian' . $kode_pembelian;
        $tanggal_pembelian = $_POST['tanggal_pembelian'];
        $id_pengguna = $_POST['id_pengguna'];
        // input ke tabel transaksi
        tambahTransaksi($id_akun_debit, $id_akun_kredit, $total, $deskripsi, $tanggal_pembelian, $kode_pembelian, $conn);

        // input ke tabel pembelian
        $sql = "INSERT INTO pembelian (id_supplier, id_barang, jumlah, harga_beli, kode_pembelian, id_pengguna, tanggal_masuk)
VALUES ('$id_supplier', '$id_barang', '$jumlah', '$harga_beli', '$kode_pembelian', '$id_pengguna', '$tanggal_pembelian')";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data pembelian berhasil ditambahkan']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data pembelian gagal ditambahkan', 'error' => $conn->error]);
        }
        break;
    case 'hapus-pembelian':
        $kode_transaksi = $_POST['kode_transaksi'];
        $sql = "DELETE FROM pembelian WHERE kode_pembelian = '$kode_transaksi'";
        $result = $conn->query($sql);
        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Data penjualan berhasil dihapus']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Data penjualan gagal dihapus']);
        }
        hapusTransaksi($kode_transaksi, $conn);

        break;
}