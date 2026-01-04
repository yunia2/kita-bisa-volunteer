<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("location:data_relawan.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT relawan.*, login.username 
        FROM relawan 
        JOIN login ON relawan.id_user = login.id_user 
        WHERE id_relawan = '$id'";

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Data relawan tidak ditemukan'); window.location='data_relawan.php';</script>";
    exit;
}

$d = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Relawan</title>
  <link rel="stylesheet" href="assets/css/form_relawan.css">
</head>
<body>

<div class="form-card">
  <h3>Edit Data Relawan</h3>

  <form action="update_relawan.php" method="POST">
    <input type="hidden" name="id_relawan" value="<?= $d['id_relawan']; ?>">
    <input type="hidden" name="id_user" value="<?= $d['id_user']; ?>">

    <div class="form-group">
      <label>Nama Relawan</label>
      <input type="text" name="nama_relawan" value="<?= htmlspecialchars($d['nama_relawan']); ?>" required>
    </div>

    <div class="form-group">
      <label>No. Telepon</label>
      <input type="text" name="telepon" value="<?= htmlspecialchars($d['telepon']); ?>" required>
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" value="<?= htmlspecialchars($d['username']); ?>" required>
    </div>

    <div class="btn-group">
      <button type="submit" class="btn-primary">Update Relawan</button>
      <a href="data_relawan.php" class="btn-cancel">Batal</a>
    </div>
  </form>
</div>

</body>
</html>
