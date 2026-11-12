<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Pengguna</title>
</head>
<body>

<?php
if (isset($_POST['username'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $peran = $_POST['peran'];

    // Menyimpan data pengguna baru ke tabel 'pengguna'
    $query = mysqli_query($koneksi, "INSERT INTO pengguna (nama, username, password, peran) VALUES ('$nama', '$username', '$password', '$peran')");

    if ($query) {
        echo '<script>alert("Selamat, pendaftaran Anda berhasil. Silakan login."); location.href="login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran gagal.");</script>';
    }
}
?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Pendaftaran Pengguna</h3>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
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
                <td>Peran</td>
                <td>
                    <select name="peran" required>
                        <option value="siswa">Siswa</option>
                        <option value="pembina">Pembina</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar User</button>
                    <a href="login.php">Login</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>