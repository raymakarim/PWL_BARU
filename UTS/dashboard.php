<?php
session_start();
// Cek status login
if($_SESSION['status'] != 'login'){
    header("Location: login.php?pesan=belum_login");
    exit;
}

include 'config.php';
$sql = "SELECT id, nama_tugas, mata_kuliah, tenggat_waktu, status FROM tugas ORDER BY tenggat_waktu ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query SQL Gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tugas - Assignment Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #007bff; }
        table { width: 90%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-tambah {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-aksi {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
            color: white;
        }
        .btn-edit { background-color: #ffc107; }
        .btn-hapus { background-color: #dc3545; }
        .btn-logout { 
            background-color: #6c757d; 
            float: right; 
            margin-left: 10px;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .status-belum { color: red; font-weight: bold; }
        .status-sedang { color: orange; font-weight: bold; }
        .status-selesai { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h2>📑 Daftar Tugas Anda</h2>
    <a href="logout.php" class="btn-logout">Logout</a>
    <a href="tambah_tugas.php" class="btn-tambah">➕ Tambah Tugas Baru</a>
    <hr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Nama Tugas</th> <th>Mata Kuliah</th> <th>Tenggat Waktu</th> <th>Status</th> <th>Aksi</th></tr></thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $id_tugas = $row['id'];
            $status = $row['status'];
            $status_class = '';
            
            if ($status == 'Belum Selesai') {
                $status_class = 'status-belum';
            } elseif ($status == 'Sedang Dikerjakan') {
                $status_class = 'status-sedang';
            } elseif ($status == 'Selesai') {
                $status_class = 'status-selesai';
            }

            echo "<tr>";
            echo "<td>" . $row["nama_tugas"] . "</td>";
            echo "<td>" . $row["mata_kuliah"] . "</td>";
            echo "<td>" . date('d F Y', strtotime($row["tenggat_waktu"])) . "</td>";
            echo "<td><span class='". $status_class ."'>" . $status . "</span></td>";
            echo "<td>";
            echo '<a href="edit_tugas.php?id=' . $id_tugas . '" class="btn-aksi btn-edit">Edit</a>';
            echo '<a href="hapus_tugas.php?id=' . $id_tugas . '" class="btn-aksi btn-hapus" onclick="return confirm(\'Yakin ingin menghapus tugas ini?\')">Hapus</a>';
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p> Tidak Ada Tugas yang tercatat . </p>";
    }
    ?>
</body>
</html>