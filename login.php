<?php
if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $text = $nik . "," . $nama . "\n";
    $fp = fopen('config.txt', 'a+');

    if (fwrite($fp, $text)) {
        echo '<script>alert("Anda berhasil Mendaftar!");</script>';
    }
} elseif (isset($_POST['masuk'])) {
    $data = file_get_contents("config.txt");
    $contents = explode("\n", $data);

    foreach ($contents as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];

        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location: home.php');
        } else {
            echo "<script>alert('Nik atau Nama Anda Salah!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri - Log In</title>
</head>

<body>
    <br><br><br><br><br><br><br>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td><input type="text" name="nik" id="" placeholder="NIK"></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" id="" placeholder="Nama Lengkap"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="daftar" value="Saya Pengguna Baru">
                    <input type="submit" name="masuk" value="Masuk">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>