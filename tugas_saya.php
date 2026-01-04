<?php
session_start();
include 'koneksi.php';

if ($_SESSION['role'] != "relawan") {
    header("location:login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penugasan Saya</title>
    <link rel="stylesheet" href="assets/css/tugas_saya.css">
</head>
<body>

<div class="page-container">
    <div class="header">
        <h2>Daftar Penugasan Saya</h2>
        <a href="relawan_dashboard.php" class="btn-back">← Kembali ke Dashboard</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Lokasi Penugasan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $sql = "SELECT p.*, l.nama_lokasi FROM penugasan p 
                    JOIN lokasi l ON p.id_lokasi = l.id_lokasi
                    JOIN relawan r ON p.id_relawan = r.id_relawan
                    WHERE r.id_user = '$id_user'
                    ORDER BY p.tgl_tugas DESC";

            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) == 0) {
                echo "<tr>
                        <td colspan='4' class='empty'>Belum ada tugas yang diberikan</td>
                      </tr>";
            } else {
                while ($d = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                            <td>".$no++."</td>
                            <td>".date('d M Y', strtotime($d['tgl_tugas']))."</td>
                            <td>".$d['nama_lokasi']."</td>
                            <td>".$d['keterangan']."</td>
                          </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
