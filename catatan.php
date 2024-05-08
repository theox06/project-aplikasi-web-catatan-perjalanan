<?php
include "header.php";

session_start();
$user = $_SESSION['username'];
$datauser = "catatan/$user.txt";

if (!file_exists($datauser)) {
    die('<center>Kamu belum mempunyai data</center');
} else {
    $file = fopen($datauser, "r");
}
?>

<html>

<body>
    <table border="1" align="center" width="50%">
        <td>
            <a>Urutkan Berdasarkan</a>
            <select id="urut" onclick="urutkan(this)">
                <option value="0">Tanggal</option>
                <option value="1">Waktu</option>
                <option value="2">Lokasi</option>
                <option value="3">Suhu</option>
            </select>
            <input type="submit" value="Urutkan">
        </td>
    </table>
    <table border="1" align="center" width="50%" height="40%">
        <td>
            <table align="center" border="1" width="80%" id="myTable">
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi yang dikunjungi</th>
                    <th>Suhu Tubuh</th>
                </tr>
                <?php
                while (($row = fgets($file)) != false) {
                    $col = explode(',', $row);
                    foreach ($col as $data) {
                        echo "<td>" . trim($data) . "</td>";
                    }
                }
                ?>
            </table>
        </td>

    </table>
    <script>
        function urutkan(urut) {
            var selectedValue = urut.value;
            sortTable(selectedValue);
        }

        th = document.getElementsByTagName('tr');

        for (let c = 0; c < th; c++) {
            th[c].addEventListener('click', item(c))
        }

        function item(c) {
            return function () {
                sortTable(c)
            }
        }

        function sortTable(c) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[c];
                    y = rows[i + 1].getElementsByTagName("TD")[c];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
</body>

</html>