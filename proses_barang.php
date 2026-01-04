<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok_barang'];

    // Kita paksa PHP buat ngasih tau error kalau gagal
    $query = "INSERT INTO barang (nama_barang, stok) VALUES ('$nama', '$stok')";
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        // Berhasil? Balik ke data_barang.php
        header("Location: data_barang.php?status=sukses");
        exit();
    } else {
        // Gagal? Kasih tau kenapa!
        echo "Gagal total! Errornya ini: " . mysqli_error($conn);
    }
} else {
    echo "Tombol simpan belum diklik!";
}
?>