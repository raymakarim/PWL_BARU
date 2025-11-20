<?php
session_start();
if($_SESSION['status'] != 'login'){
    header("Location: login.php?pesan=belum_login");
    exit;
}
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Proses Tugas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<?php
// Fungsi untuk menangani upload file (tetap sama)
function handle_file_upload($file_array) {
    if (isset($file_array) && $file_array['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_name = basename($file_array["name"]);
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = md5(time() . $file_name) . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        if (move_uploaded_file($file_array["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }
    return null;
}

// --- Logika Tambah Tugas (Create) ---
if (isset($_POST['simpan'])) {
    // VARIABEL DIAMBIL LANGSUNG TANPA ESCAPING (RISIKO INJECTION)
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $deskripsi = $_POST['deskripsi'];
    $tenggat_waktu = $_POST['tenggat_waktu'];
    $jenis_tugas = $_POST['jenis_tugas'];
    $status = $_POST['status'];
    
    $file_lampiran = handle_file_upload($_FILES['file_lampiran']);
    
    if ($file_lampiran === false) {
        echo "<h2><span class='error'>❌ Gagal Upload File</span></h2>";
        echo "<p>Terjadi error saat mengupload file.</p>";
    } else {
        $file_sql = $file_lampiran ? "'$file_lampiran'" : "NULL";

        $sql_insert = "INSERT INTO tugas (nama_tugas, mata_kuliah, deskripsi, tenggat_waktu, jenis_tugas, status, file_lampiran) 
                       VALUES ('$nama_tugas', '$mata_kuliah', '$deskripsi', '$tenggat_waktu', '$jenis_tugas', '$status', $file_sql)";
        
        if (mysqli_query($conn, $sql_insert)) {
            echo "<h2><span class='success'>✅ Tugas Berhasil Ditambahkan!</span></h2>";
            echo "<p>Tugas **$nama_tugas** berhasil disimpan.</p>";
        } else {
            echo "<h2><span class='error'>❌ Gagal Menambah Tugas</span></h2>";
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
} 

// --- Logika Edit Tugas (Update) ---
elseif (isset($_POST['edit'])) {
    // VARIABEL DIAMBIL LANGSUNG TANPA ESCAPING (RISIKO INJECTION)
    $id_tugas = $_POST['id_tugas'];
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $deskripsi = $_POST['deskripsi'];
    $tenggat_waktu = $_POST['tenggat_waktu'];
    $jenis_tugas = $_POST['jenis_tugas'];
    $status = $_POST['status'];
    $old_file = $_POST['old_file'];
    
    $file_lampiran_baru = handle_file_upload($_FILES['file_lampiran']);
    $file_update_sql = "";
    $should_delete_old_file = false;

    if ($file_lampiran_baru === false) {
         echo "<h2><span class='error'>❌ Gagal Upload File Baru</span></h2>";
         echo "<p>Terjadi error saat mengupload file.</p>";
    } elseif ($file_lampiran_baru !== null) {
        $file_update_sql = ", file_lampiran = '$file_lampiran_baru'";
        if ($old_file && file_exists($old_file)) {
            $should_delete_old_file = true;
        }
    }

    $sql_update = "UPDATE tugas SET 
                   nama_tugas = '$nama_tugas', 
                   mata_kuliah = '$mata_kuliah', 
                   deskripsi = '$deskripsi', 
                   tenggat_waktu = '$tenggat_waktu', 
                   jenis_tugas = '$jenis_tugas', 
                   status = '$status'
                   $file_update_sql
                   WHERE id = '$id_tugas'";
    
    if (mysqli_query($conn, $sql_update)) {
        if ($should_delete_old_file) {
             unlink($old_file); 
        }
        echo "<h2><span class='success'>✅ Tugas Berhasil Diperbarui!</span></h2>";
        echo "<p>Tugas **$nama_tugas** berhasil diubah.</p>";
    } else {
        echo "<h2><span class='error'>❌ Gagal Memperbarui Tugas</span></h2>";
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

}
else {
    echo "<h2><span class='error'>❌ Akses Tidak Sah</span></h2>";
}
?>

<br><a href='dashboard.php'>Kembali ke Daftar Tugas</a>
</body>
</html>