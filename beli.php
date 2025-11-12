<?php

 $id_event = $_GET['id_event'];

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Beli Tiket</title>
</head>
<body>
    <h3>Pembelian Tiket</h3>
    <form method="POST" action="proses.php">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Berapa Tiket </td>
                <td>:</td>
                <td><input type="text" name="jumlah"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="hidden" name="event_id" value="<?php echo $id_event; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="beli" value="Pesan">
                    <input type="reset" name="Batal">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>