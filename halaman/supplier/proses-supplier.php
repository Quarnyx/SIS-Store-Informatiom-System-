<?php
require_once '../../config.php';
switch ($_GET['aksi']) {
    case 'tambah-supplier':
        $nama_supplier = $_POST['nama_supplier'];
        $kontak_supplier = $_POST['kontak'];
        $alammat = $_POST['alamat'];
        $sql = "INSERT INTO supplier (nama_supplier, kontak_supplier, alamat) VALUES ('$nama_supplier', '$kontak_supplier', '$alammat')";
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
    case 'edit-supplier':
        $id = $_POST['id'];
        $nama_supplier = $_POST['nama_supplier'];
        $kontak_supplier = $_POST['kontak'];
        $alammat = $_POST['alamat'];
        $sql = "UPDATE supplier SET alamat = '$alammat', nama_supplier = '$nama_supplier', kontak_supplier = '$kontak_supplier' WHERE id_supplier =
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
    case 'hapus-supplier':
        $id = $_POST['id'];
        $sql = "DELETE FROM supplier WHERE id_supplier = '$id'";
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