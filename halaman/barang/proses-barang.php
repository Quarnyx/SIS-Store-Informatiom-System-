<?php
require_once '../../config.php';
switch ($_GET['aksi'] ?? '') {
    case 'tambah-barang':
        $satuan = $_POST['satuan'];
        // generate product code based on $satuan
        $kode_barang = strtoupper(substr($satuan, 0, 3));
        // find last product code
        $query = mysqli_query($conn, "SELECT MAX(kode_barang) AS kode_barang FROM barang WHERE kode_barang LIKE '$kode_barang%'");
        $data = mysqli_fetch_array($query);
        $max = $data['kode_barang'] ? substr($data['kode_barang'], 4, 3) : "000";
        $no = $max + 1;
        $char = $kode_barang . "-";
        $kode_barang = $char . sprintf("%03s", $no);
        $nama_barang = $_POST['nama_barang'];
        $deskripsi = $_POST['deskripsi'];
        $harga_beli = $_POST['harga_beli'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_jual = $_POST['harga_jual'];
        $harga_jual = preg_replace('/[^0-9]/', '', $_POST['harga_jual']);
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $x = explode('.', $foto);
        // rename file with product code
        $foto = $kode_barang . '.' . end($x);
        $path = 'foto-barang/' . $foto;
        move_uploaded_file($tmp, $path);

        $sql = "INSERT INTO barang (nama_barang, kode_barang, deskripsi, harga_beli, harga_jual, satuan, foto) 
        VALUES ('$nama_barang','$kode_barang', '$deskripsi', '$harga_beli', '$harga_jual', '$satuan', '$foto')";
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
    case 'edit-barang':
        $id = $_POST['id'];
        $nama_barang = $_POST['nama_barang'];
        $deskripsi = $_POST['deskripsi'];
        $harga_beli = $_POST['harga_beli'];
        $harga_beli = preg_replace('/[^0-9]/', '', $_POST['harga_beli']);
        $harga_jual = $_POST['harga_jual'];
        $harga_jual = preg_replace('/[^0-9]/', '', $_POST['harga_jual']);
        $satuan = $_POST['satuan'];
        $satuan_lama = $_POST['satuan_lama'];
        $kode_barang = $_POST['kode_barang'];
        // jika satuan berubah
        if ($satuan != $satuan_lama) {
            $generator_kode_barang = strtoupper(substr($satuan, 0, 3));
            $query = mysqli_query($conn, "SELECT MAX(kode_barang) AS kode_barang FROM barang WHERE kode_barang LIKE '$generator_kode_barang%'");
            $data = mysqli_fetch_array($query);
            $max = $data['kode_barang'] ? substr($data['kode_barang'], 4, 3) : "000";
            $no = $max + 1;
            $char = $generator_kode_barang . "-";
            $kode_barang = $char . sprintf("%03s", $no);
        }

        $sql = "UPDATE barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual
= '$harga_jual', satuan = '$satuan' WHERE id_barang = '$id'";
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
    case 'edit-foto-barang':
        $id = $_POST['id'];
        $kode_barang = $_POST['kode_barang'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $x = explode('.', $foto);
        // rename file with product code
        $foto = $kode_barang . '.' . end($x);
        $path = 'foto-barang/' . $foto;
        move_uploaded_file($tmp, $path);
        $sql = "UPDATE barang SET foto = '$foto' WHERE id_barang = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo 'ok';
            http_response_code(200);
        } else {
            echo 'error';
            echo $conn->error;
        }
        break;
    case 'hapus-barang':
        $id = $_POST['id'];
        $sql = "DELETE FROM barang WHERE id_barang = '$id'";
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