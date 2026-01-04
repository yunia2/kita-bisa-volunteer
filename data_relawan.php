<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Relawan</title>
  <link rel="stylesheet" href="assets/css/style_data-relawan.css">
</head>
<body>

<div class="container">

  <div class="header">
    <h2>Data Relawan</h2>
    <div>
      <a href="admin_dashboard.php">← Dashboard</a>
      <a href="form_relawan.php" class="btn-add">+ Tambah Relawan</a>
    </div>
  </div>

  <table>
    <tr>
      <th>No</th>
      <th>Nama Relawan</th>
      <th>No. Telepon</th>
      <th>Username</th>
      <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $sql = "SELECT relawan.*, login.username 
            FROM relawan 
            JOIN login ON relawan.id_user = login.id_user";
    $query = mysqli_query($conn, $sql);

    while($d = mysqli_fetch_array($query)) {
      echo "
      <tr>
        <td>{$no}</td>
        <td>{$d['nama_relawan']}</td>
        <td>{$d['telepon']}</td>
        <td>{$d['username']}</td>
        <td class='action'>
          <a href='edit_relawan.php?id={$d['id_relawan']}' class='edit'>Edit</a>
          <a href='hapus_relawan.php?id={$d['id_relawan']}' 
             class='hapus'
             onclick=\"return confirm('Yakin ingin menghapus relawan ini?')\">
             Hapus
          </a>
        </td>
      </tr>";
      $no++;
    }
    ?>
  </table>

</div>

</body>
</html>
