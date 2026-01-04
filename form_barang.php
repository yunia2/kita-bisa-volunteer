<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $query = mysqli_query($conn, 
        "INSERT INTO barang (nama_barang, stok) VALUES ('$nama', '$stok')"
    );

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='data_barang.php';</script>";
    } else {
        echo "Gagal Simpan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="assets/css/form_barang.css">
</head>
<body>

<div class="form-card">
  <h3>Tambah Barang</h3>

  <form action="" method="POST">
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama" placeholder="Masukkan nama barang" required>
    </div>

    <div class="form-group" style="margin-top:15px;">
      <label>Stok Awal</label>
      <input type="number" name="stok" placeholder="Jumlah stok" required>
    </div>

    <div class="btn-group">
      <button type="submit" name="simpan" class="btn-primary">
        Simpan ke Gudang
      </button>
      <a href="data_barang.php" class="btn-cancel">Batal</a>
    </div>
  </form>
</div>

</body>
</html>
