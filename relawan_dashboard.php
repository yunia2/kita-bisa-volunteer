<?php
session_start();

// proteksi akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != "relawan") {
    header("location:login.php");
    exit;
}

include "koneksi.php";

// ambil nama relawan
$username_login = $_SESSION['username'];
$get_profil = mysqli_query($conn, "SELECT r.nama_relawan, r.id_relawan FROM relawan r 
                                   JOIN login l ON r.id_user = l.id_user 
                                   WHERE l.username = '$username_login'");
$profil = mysqli_fetch_assoc($get_profil);
$id_relawan = $profil['id_relawan'];

$title = "Dashboard Relawan";
$use_transparent = true; // untuk tampilan Gen Z (navbar transparan)
include "layout/header.php"; 
?>

<section class="hero">
  <div class="hero-inner">
    <h1>Halo, <?= $profil['nama_relawan']; ?> 👋</h1>
    <p>Terima kasih telah menjadi bagian dari misi kemanusiaan.</p>
  </div>
</section>

<div style="padding:35px;">
  <h2>Menu Navigasi</h2>
  <div class="card-grid">
    <a href="tugas_saya.php" class="card link-card">
      <h3>📌 Penugasan Saya</h3>
      <p>Lihat tugas aktif & lokasi yang harus Anda datangi.</p>
    </a>

    <a href="input_logistik_keluar.php" class="card link-card">
      <h3>📦 Lapor Penggunaan Barang</h3>
      <p>Catat logistik yang digunakan selama bertugas.</p>
    </a>

    <a href="logout.php" class="card link-card" style="background:#b34747;color:#fff;">
      <h3>🚪 Logout</h3>
      <p>Keluar dari sistem</p>
    </a>
  </div>

  <hr style="margin:45px 0;">
  
  <h2>Status Tugas Terakhir Anda</h2>

  <table class="table-custom">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $q_tugas = mysqli_query($conn, 
              "SELECT p.*, l.nama_lokasi FROM penugasan p
               JOIN lokasi l ON p.id_lokasi = l.id_lokasi
               WHERE p.id_relawan = '$id_relawan'
               ORDER BY p.tgl_tugas DESC LIMIT 5");

      if(mysqli_num_rows($q_tugas) == 0) {
        echo "<tr><td colspan='3' style='text-align:center;'>Belum ada tugas</td></tr>";
      } else {
        while($t = mysqli_fetch_array($q_tugas)) {
          echo "<tr>
                  <td>{$t['tgl_tugas']}</td>
                  <td>{$t['nama_lokasi']}</td>
                  <td>{$t['keterangan']}</td>
                </tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>

<?php include "layout/footer.php"; ?>
