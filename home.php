<?php
include "header.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri - Home</title>
</head> -->

<body>
    <table border="1" height="40%" width="50%" align="center">
        <td>Selamat Datang
            <?php echo $_SESSION['username'] ?> di aplikasi peduli diri
        </td>
    </table>
</body>

</html>