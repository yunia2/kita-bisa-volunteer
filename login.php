<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Volunteer System</title>
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>

<div class="overlay"></div>

<div class="wrapper">
  <div class="login-card">

    <div class="left">
      <h1>Volunteer Kita Bisa</h1>
      <p>
        Sistem manajemen relawan  
        untuk kegiatan sosial dan kemanusiaan.
      </p>
    </div>

    <div class="right">
      <h2>Login</h2>
      <p>Masukkan akun volunteer</p>

      <form action="proses_login.php" method="POST">
        <div class="input-group">
          <input type="text" name="username" required>
          <label>Username</label>
        </div>

        <div class="input-group">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>

        <button type="submit" name="login">Masuk</button>
      </form>
    </div>

  </div>
</div>
<div class="particles">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>

<div class="overlay"></div>

</body>
</html>
