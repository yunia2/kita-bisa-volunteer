<?php
include 'koneksi.php';
?>
  <link rel="stylesheet" href="assets/css/style_barang.css">

<div class="page-wrapper">

  <div class="page-header">
    <a href="admin_dashboard.php" class="btn-back">← Kembali ke Dashboard</a>
    <a href="form_barang.php" class="btn-add">+ Tambah Barang Baru</a>
  </div>

  <div class="card-table">
    <table class="table-barang">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $db = mysqli_query($conn, "SELECT * FROM barang");
        while($d = mysqli_fetch_array($db)) {
          echo "<tr>
                  <td>".$no++."</td>
                  <td>$d[nama_barang]</td>
                  <td>$d[stok]</td>
                  <td class='aksi'>
                    <a href='edit_barang.php?id=$d[id_barang]' class='btn-edit'>Edit</a>
                    <a href='hapus_barang.php?id=$d[id_barang]' 
                       class='btn-hapus'
                       onclick='return confirm(\"Yakin ingin menghapus barang ini?\")'>
                       Hapus
                    </a>
                  </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</div>
