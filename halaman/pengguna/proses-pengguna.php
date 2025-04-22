<?php
require_once '../../config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-pengguna':
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        $sql = "INSERT INTO pengguna (username, password, level, nama) VALUES ('$username', '$password', '$level', '$nama')";
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
    case 'hapus-pengguna':
        $id = $_POST['id'];
        $sql = "DELETE FROM pengguna WHERE id_pengguna = '$id'";
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
    case 'edit-pengguna':
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        $sql = "UPDATE pengguna SET username = '$username', level = '$level', nama = '$nama' WHERE id_pengguna = '$id'";
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
    case 'ganti-password':
        $id = $_POST['id'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE pengguna SET password = '$password' WHERE id_pengguna = '$id'";
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