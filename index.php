<?php

include 'config.php';
$sql = " SELECT id, nama_event, harga, kuota FROM events ORDER BY id ASC ";
$result = mysqli_query($conn , $sql);


if (!$result) {
    die ("Queri SQL Gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
        <meta charset="UTF-8">
        <title> Daftar Event </title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
             table { width: 80%; border-collapse: collapse; margin-top: 20px; }
             th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
             th { background-color: #f2f2f2; }
            .tiket-habis { color: red; font-weight: bold; }
            .btn-beli {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        </style>
</head>
<body>

        <h2> Daftar Semua Event </h2>
        <?php

        if(mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<thead><tr><th>Nama Event</th> <th> Harga Ticket </th> <th> Sisa Quota </th> <th> Aksi </th></tr></thead>";
            echo "<tbody>";

            while($row = mysqli_fetch_assoc($result)) {

                $id_event = $row['id'];
                $harga = $row['harga'];
                $kuota = $row['kuota'];

                $harga_rp = "Rp " . number_format($harga, 0, ',','.');

                $aksi_html = '';

                if ($kuota > 0) {
                    $link_url = "beli.php?id_event=" . $id_event;
                    $aksi_html = '<a href="' . $link_url . '" class="btn-beli"> Beli Tiket </a>';
                } else {

                    $aksi_html = '<span class= "tiket-habis">Tiket Habis</span>';
                }
                
                echo "<tr>";
                echo "<td>" . $row["nama_event"] . "</td>";
                echo "<td>" . $harga_rp . "</td>";
                echo "<td>" . $kuota.  "</td>";
                echo "<td>" . $aksi_html. "</td>";
                echo "</tr>";
            }

            echo"</tbody>";
            echo"</table>";

        } else {
            echo "<p> Tidak Ada Event yang tersedia . </p>"; 
        }
        ?>
</body>
</html>




