<?php
// Inisialisasi session
session_start();

// Mengecek apakah ada session user yang aktif, jika tidak arahkan ke login.php
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Manajemen Ekstrakurikuler</title>
</head>
<body style="text-align: center;">

    <h1>Halaman Sistem Manajemen Ekstrakurikuler</h1>
    <a href="index.php">Home</a> |
    <a href="logout.php">Logout</a>
    <hr>

    <h3>Selamat datang, <?php echo $_SESSION['user']['nama']; ?>!</h3>
    <p>Peran Anda: <strong><?php echo $_SESSION['user']['peran']; ?></strong></p>
    <p>Halaman ini tampil setelah pengguna berhasil login.</p>

</body>
</html>