<?php
include 'koneksi.php';
$id = $_GET['id'];

// Relawan biasanya terikat dengan tabel login (id_user)
// Kita ambil id_user dulu agar bisa menghapus akun loginnya juga jika diperlukan
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT id_user FROM relawan WHERE id_relawan = '$id'"));
$id_user = $data['id_user'];

// Hapus data di tabel relawan
$query = mysqli_query($conn, "DELETE FROM relawan WHERE id_relawan = '$id'");
// Hapus juga akun loginnya
mysqli_query($conn, "DELETE FROM login WHERE id_user = '$id_user'");

header("location:data_relawan.php?status=sukses-hapus");
?>