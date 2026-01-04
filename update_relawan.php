<?php
include 'koneksi.php';
$id_r = $_POST['id_relawan'];
$id_u = $_POST['id_user'];
$nama = $_POST['nama_relawan'];
$telp = $_POST['telepon'];
$user = $_POST['username'];

// Update tabel relawan
mysqli_query($conn, "UPDATE relawan SET nama_relawan='$nama', telepon='$telp' WHERE id_relawan='$id_r'");

// Update tabel login (username)
mysqli_query($conn, "UPDATE login SET username='$user' WHERE id_user='$id_u'");

header("location:data_relawan.php?status=sukses-update");
?>