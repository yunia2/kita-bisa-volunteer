<?php
include 'koneksi.php';

if (isset($_POST['gas'])) {
    $id_r = $_POST['relawan'];
    $id_l = $_POST['lokasi'];
    $id_b = $_POST['barang'];
    $jml  = $_POST['jumlah'];

    // Simpan ke tabel asli
    $q1 = mysqli_query($conn, "INSERT INTO penugasan (id_relawan, id_lokasi, tgl_tugas) VALUES ('$id_r', '$id_l', NOW())");
    $id_tugas = mysqli_insert_id($conn); 

    $q2 = mysqli_query($conn, "INSERT INTO logistik (id_penugasan, id_barang, jumlah_keluar) VALUES ('$id_tugas', '$id_b', '$jml')");
    
    if($q1 && $q2) {
        // INI KUNCINYA: Pakai JS supaya tab PDF kebuka, tapi halaman input tetap ada
        echo "<script>
            alert('Data Berhasil Disimpan!');
            window.open('cetak_penugasan.php?id=$id_tugas', '_blank');
            window.location.href = 'input_tugas.php';
        </script>";
        exit; // Hentikan script agar tidak lari ke bawah
    }
}
?>

<h2>Form Input Penugasan</h2>
<form method="POST">
    Relawan: <select name="relawan" required>
        <?php $res=mysqli_query($conn,"SELECT * FROM relawan"); while($row=mysqli_fetch_array($res)) echo "<option value='$row[id_relawan]'>$row[nama_relawan]</option>"; ?>
    </select><br><br>
    
    Lokasi: <select name="lokasi" required>
        <?php $res=mysqli_query($conn,"SELECT * FROM lokasi"); while($row=mysqli_fetch_array($res)) echo "<option value='$row[id_lokasi]'>$row[nama_lokasi]</option>"; ?>
    </select><br><br>
    
    Barang: <select name="barang" required>
        <?php $res=mysqli_query($conn,"SELECT * FROM barang"); while($row=mysqli_fetch_array($res)) echo "<option value='$row[id_barang]'>$row[nama_barang]</option>"; ?>
    </select><br><br>
    
    Jumlah: <input type="number" name="jumlah" required><br><br>
    
    <button type="submit" name="gas">Simpan & Cetak</button>
</form>