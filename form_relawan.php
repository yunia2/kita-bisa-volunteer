<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama     = $_POST['nama'];
    $telp     = $_POST['telepon'];
    $user     = $_POST['username'];
    $pass     = $_POST['password'];
    $role     = 'relawan';

    $query_login = mysqli_query($conn, 
        "INSERT INTO login (username, password, role) 
         VALUES ('$user', '$pass', '$role')"
    );
    
    if($query_login) {
        $id_user_baru = mysqli_insert_id($conn);

        mysqli_query($conn, 
            "INSERT INTO relawan (nama_relawan, telepon, id_user) 
             VALUES ('$nama', '$telp', '$id_user_baru')"
        );
        
        header("location:data_relawan.php");
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Relawan</title>
  <link rel="stylesheet" href="assets/css/form_relawan.css">
</head>
<body>

<div class="form-card">
  <h3>Pendaftaran Relawan</h3>

  <form method="POST">

    <div class="section-title">Data Profil</div>

    <div class="form-group">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
    </div>

    <div class="form-group">
      <label>No. Telepon</label>
      <input type="text" name="telepon" placeholder="08xxxxxxxxxx" required>
    </div>

    <div class="section-title">Data Login</div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" placeholder="Username untuk login" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" placeholder="Password" required>
    </div>

    <div class="btn-group">
      <button type="submit" name="simpan" class="btn-primary">
        Daftarkan Relawan
      </button>
      <a href="data_relawan.php" class="btn-cancel">Batal</a>
    </div>

  </form>
</div>

</body>
</html>
