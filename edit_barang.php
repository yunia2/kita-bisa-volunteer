<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
$d = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Barang</title>
  <link rel="stylesheet" href="assets/css/edit_barang.css">
</head>
<body>

<div class="form-card">
  <h3>Edit Data Barang</h3>

  <form action="update_barang.php" method="POST">
    <input type="hidden" name="id_barang" value="<?= $d['id_barang']; ?>">

    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" value="<?= $d['nama_barang']; ?>" required>
    </div>

    <div class="form-group" style="margin-top:15px;">
      <label>Stok</label>
      <input type="number" name="stok" value="<?= $d['stok']; ?>" required>
    </div>

    <div class="btn-group">
      <button type="submit" class="btn-primary">
        Simpan Perubahan
      </button>
      <a href="data_barang.php" class="btn-cancel">
        Batal
      </a>
    </div>
  </form>
</div>

</body>
</html>
