<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != "relawan") {
    header("location:login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

if (isset($_POST['lapor'])) {
    $id_tugas  = $_POST['id_penugasan'];
    $id_barang = $_POST['id_barang'];
    $jumlah    = $_POST['jumlah'];

    $simpan = mysqli_query($conn, "INSERT INTO logistik (id_penugasan, id_barang, jumlah_keluar) 
                                   VALUES ('$id_tugas', '$id_barang', '$jumlah')");
    
    if ($simpan) {
        mysqli_query($conn, "UPDATE barang SET stok = stok - $jumlah WHERE id_barang = '$id_barang'");
        echo "<script>alert('Laporan logistik berhasil dikirim!'); window.location='relawan_dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Logistik</title>
    <link rel="stylesheet" href="assets/css/logistik_keluar.css">
</head>
<body>

<div class="form-container">
    <h2>Lapor Penggunaan Barang</h2>

    <form method="POST">
        <div class="form-group">
            <label>Pilih Penugasan</label>
            <select name="id_penugasan" required>
                <option value="">-- Pilih Tugas & Lokasi --</option>
                <?php
                $q_tugas = mysqli_query($conn, "SELECT p.id_penugasan, p.tgl_tugas, l.nama_lokasi 
                                                FROM penugasan p 
                                                JOIN lokasi l ON p.id_lokasi = l.id_lokasi");
                while($t = mysqli_fetch_array($q_tugas)){
                    echo "<option value='$t[id_penugasan]'>
                            $t[tgl_tugas] - $t[nama_lokasi]
                          </option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Pilih Barang</label>
            <select name="id_barang" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $q_brg = mysqli_query($conn, "SELECT * FROM barang WHERE stok > 0");
                while($b = mysqli_fetch_array($q_brg)){
                    echo "<option value='$b[id_barang]'>
                            $b[nama_barang] (Stok: $b[stok])
                          </option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah Diambil</label>
            <input type="number" name="jumlah" min="1" required>
        </div>

        <div class="form-action">
            <button type="submit" name="lapor">Kirim Laporan</button>
            <a href="relawan_dashboard.php">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
