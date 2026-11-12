<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Manajemen Ekstrakurikuler</title>
</head>
<body>

<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Mengecek ke tabel 'pengguna' di database Anda
    $query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        echo '<script>alert("Selamat datang, ' . $data['nama'] . ' (' . $data['peran'] . ')"); location.href="index.php";</script>';
    } else {
        echo '<script>alert("Username atau password tidak sesuai.");</script>';
    }
}
?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login Pengguna</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Login</button>
                    <a href="daftar.php">Daftar</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>