<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hitung Diskon</title>
</head>
<body>
<form action="HitungDiskon.php" method="post">
        <h2>Hitung Diskon</h2>
        <table>
            <tr>
                <td>Harga Satuan</td>
                <td>:</td>
                <td><input type="number" name="satuan"></td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>:</td>
                <td><input type="number" name="jumlah"></td>
            </tr>
            <tr>
                <td>Member</td>
                <td>:</td>
                <td><input type="checkbox" name="member" value="yes"> Yes:</td>
            </tr>
            <tr>
                <td colspan="3" >
                    <input type="submit" value="SUBMIT">
                    <input type="reset" value="BATAL">
                </td>
            </tr>
        </table>
</form>

<?php

function perhitungan () {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $satuan = $_POST['satuan'];
    $jumlah = $_POST['jumlah'];
    $member = $_POST['member'];

    $Total = $jumlah * $satuan;

    if ($member == "yes") {
        if ($Total > 100000) {
            $diskon = $Total * 0.20;
        } else {
            $diskon = $Total * 0.10;
        }
    } elseif ($Total > 100000) {
        $diskon = $Total * 0.10;
    } else {
        $diskon = 0;
    }

    $Bayar = $Total - $diskon;

    echo "<b>Total Pembayaran Adalah</b>";
    echo "Harga Satuan : $satuan";
    echo "Jumlah Barang : $jumlah";
    echo "Total pembelian : $Total";
    echo "Diskon : $diskon";
    echo "Total Bayar : $Bayar";
}

}

?>