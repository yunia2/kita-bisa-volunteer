<?php
include 'koneksi.php';
$id = $_GET['id'];

// Menghapus data berdasarkan id_barang
$query = mysqli_query($conn, "DELETE FROM barang WHERE id_barang = '$id'");

if($query) {
    header("location:data_barang.php?status=sukses-hapus");
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>