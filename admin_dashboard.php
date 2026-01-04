<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['role'])) { header("location:login.php"); exit; }

$r = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM relawan"));
$b = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM barang"));
$t = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM penugasan"));

$title = "Dashboard Admin";
$use_transparent = true;
include "layout/header.php";
?>

<section class="hero" style="background-image:url('assets/img/volunteer 2.png');">
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <h1>#SemuaBisaPulih</h1>
    <p>Halo, <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</p>
    <h2>
      Kami anak muda yang percaya bahwa setiap luka pasca bencana <br> punya hak untuk sembuh.
      Kami hadir bukan hanya untuk mendata,<br> tapi menemani proses #HinggaPulih
    </h2>

    <div class="card-container">

      <div class="card-grid">
        <div class="card"><div class="card-number"><?= $r; ?></div><p>Total Relawan</p></div>
        <div class="card"><div class="card-number"><?= $b; ?></div><p>Barang Tersedia</p></div>
        <div class="card"><div class="card-number"><?= $t; ?></div><p>Tugas Aktif</p></div>
      </div>

      <div class="btn-box">
        <a href="data_barang.php" class="btn-primary">Kelola Barang</a>
        <a href="data_relawan.php" class="btn-primary">Data Relawan</a>
        <a href="cetak_penugasan.php" class="btn-primary">Cetak Penugasan</a>
        <a href="cetak_logistik.php" class="btn-primary">Cetak Logistik</a>
      </div>

    </div>
  </div>
</section>

<?php include "layout/footer.php"; ?>
