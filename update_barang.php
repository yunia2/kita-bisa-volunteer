<?php
include 'koneksi.php';
$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$stok = $_POST['stok'];

$sql = "UPDATE barang SET nama_barang='$nama', stok='$stok' WHERE id_barang='$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    header("location:data_barang.php?status=sukses-update");
} else {
    echo "Gagal update data";
}
?>