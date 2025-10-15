<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hitung Diskon</title>
</head>
<body>

<form action="" method="post">
    <center>
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
                <td><input type="checkbox" name="member" value="yes"> Yes</td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="submit" value="SUBMIT">
                    <input type="reset" value="BATAL">
                </td>
            </tr>
        </table>
    </center>
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $satuan = $_POST['satuan'];
    $jumlah = $_POST['jumlah'];
    $member = $_POST['member'];

    $total = $jumlah * $satuan;

    if ($member == 'yes') {
        if ($total >= 100000) {
            $diskon = $total * 0.20;
        } else {
            $diskon = $total * 0.10;
        }
    } elseif ($total > 100000) {
        $diskon = $total * 0.10;
    } else {
        $diskon = 0;
    }

    $bayar = $total - $diskon;

    echo "<center><b>Total Pembayaran Adalah</b></center>";
    echo "<center>Harga Satuan    : $satuan </center>";
    echo "<center>Jumlah Barang   : $jumlah </center>";
    echo "<center>Member          : $member </center>";
    echo "<center>Total pembelian : $total </center>";
    echo "<center>Diskon          : $diskon </center>";
    echo "<center>Total Bayar     : $bayar </center>";
}
?>
</body>
</html>
