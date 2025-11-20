<?php
session_start();
if($_SESSION['status'] != 'login'){
    header("Location: login.php?pesan=belum_login");
    exit;
}

include 'config.php';

$id_tugas = $_GET['id'];

$sql_file = "SELECT file_lampiran FROM tugas WHERE id = '$id_tugas'";

$result_file = mysqli_query($conn, $sql_file); 

if ($result_file) {
    $data_file = mysqli_fetch_assoc($result_file);
    $file_lampiran = $data_file['file_lampiran'];

    $sql_hapus = "DELETE FROM tugas WHERE id = '$id_tugas'";
    $query_hapus = mysqli_query($conn, $sql_hapus);

    if ($query_hapus) {

        if (!empty($file_lampiran) && file_exists($file_lampiran)) {
            unlink($file_lampiran);
        }

        header("Location: dashboard.php?pesan=hapus_sukses");
        exit;
    } else {
        die("Gagal menghapus data dari database: " . mysqli_error($conn));
    }
} else {
    die("Gagal mengambil informasi file: " . mysqli_error($conn));
}

?>