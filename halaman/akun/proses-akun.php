<?php
require_once '../../config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-akun':
        $nama_akun = $_POST['nama_akun'];
        $jenis_akun = $_POST['jenis_akun'];
        $kode_akun = $_POST['kode_akun'];
        $akun_wajib = $_POST['akun_wajib'];
        $sql = "INSERT INTO akun (nama_akun, jenis_akun,kode_akun, wajib) VALUES ('$nama_akun', '$jenis_akun', '$kode_akun', '$akun_wajib')";
        $result = $conn->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $conn->error;
            http_response_code(400);
        }
        break;
    case 'edit-akun':
        $id = $_POST['id'];
        $nama_akun = $_POST['nama_akun'];
        $jenis_akun = $_POST['jenis_akun'];
        $kode_akun = $_POST['kode_akun'];
        $akun_wajib = $_POST['akun_wajib'];
        $sql = "UPDATE akun SET nama_akun = '$nama_akun',jenis_akun = '$jenis_akun',kode_akun = '$kode_akun', wajib = '$akun_wajib' WHERE id_akun =
'$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $conn->error;
            http_response_code(400);
        }
        break;
    case 'hapus-akun':
        $id = $_POST['id'];
        $sql = "DELETE FROM akun WHERE id_akun = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $conn->error;
            http_response_code(400);
        }
        break;
}
