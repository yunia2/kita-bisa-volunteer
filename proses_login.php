<?php
session_start();
include 'koneksi.php';

echo "DEBUG: proses_login.php terpanggil<br>";

if (!isset($_POST['login'])) {
    echo "DEBUG: Tombol login tidak terbaca";
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // password plain text (sesuai data dummy)

    $query = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);
    $ketemu = mysqli_num_rows($query);

    if ($ketemu > 0) {
        $_SESSION['id_user']  = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: admin_dashboard.php");
            exit;
        } else {
            header("Location: relawan_dashboard.php");
            exit;
        }
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
        exit;
    }
}
?>
