<?php
require_once '../../config.php';
function tambahTransaksi($akun_debit, $akun_kredit, $total, $deskripsi, $kode_transaksi, $tanggal_transaksi, $conn)
{
    $sql = "INSERT INTO transaksi (id_akun_debit, id_akun_kredit, total, deskripsi, kode_transaksi, tanggal_transaksi) 
    VALUES ('$akun_debit', '$akun_kredit', '$total', '$deskripsi', '$kode_transaksi', '$tanggal_transaksi')";
    $result = $conn->query($sql);
    if ($result) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo $conn->error;
    }
}

switch ($_GET['aksi']) {
    case 'tambah-transaksi':
        $akun_debit = $_POST['id_akun_debit'];
        $akun_kredit = $_POST['id_akun_kredit'];
        $total = $_POST['total'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $kode_jurnal = 'JRNL' . date('YmdHis');
        tambahTransaksi($akun_debit, $akun_kredit, $total, $deskripsi, $kode_jurnal, $tanggal_transaksi, $conn);
        echo json_encode(['status' => 'success', 'message' => 'Data transaksi berhasil ditambahkan']);
        break;
}