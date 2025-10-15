<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title>Tugas Struktur Kendali Perulangan</title>
</head>

<body>
    <center>
        <h2>Tugas Struktur Kendali Perulangan</h2>
        <form action="" method="post" >
            <table>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tgl_lahir" required></td>
                </tr>
                <tr>
                    <td>Bilangan</td>
                    <td>:</td>
                    <td><input type="number" name="bilangan" required></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </center>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl_lahir = $_POST['tgl_lahir'];
    $bilangan = $_POST['bilangan'];

    // Menghitung umur
    $lahir = new DateTime($tgl_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($lahir)->y;

    echo "<center><h3>Hasil Perhitungan</h3></center>";
    echo "<center>Usia saat ini adalah: <b>$umur Tahun</b></center>";
    echo "<center>Bilangan yang diinputkan adalah: <b>$bilangan</b></center><br>";
    echo "<center>Usia saya selanjutnya adalah</center>";
    echo "<center>";
    for ($i = 1; $i <= $bilangan; $i++) {
        echo ($umur + $i) . " Tahun<br>";
    }
    echo "</center>";
}

?>

</body>

</html>
