<?php
session_start();
if($_SESSION['status'] != 'login'){
    header("Location: login.php?pesan=belum_login");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h3 { color: #007bff; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        td { padding: 8px; }
        input[type="text"], input[type="date"], textarea, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"], input[type="reset"] { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; }
        input[type="submit"] { background-color: #28a745; color: white; }
        input[type="reset"] { background-color: #6c757d; color: white; }
        .radio-group label { margin-right: 15px; }
    </style>
</head>
<body>
    <h3>Tambah Tugas Baru</h3>
    <form method="POST" action="proses_tugas.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Tugas (Text Input)</td>
                <td>:</td>
                <td><input type="text" name="nama_tugas" required></td>
            </tr>
            <tr>
                <td>Mata Kuliah (Text Input)</td>
                <td>:</td>
                <td><input type="text" name="mata_kuliah" required></td>
            </tr>
            <tr>
                <td>Deskripsi Tugas (Text Area)</td>
                <td>:</td>
                <td><textarea name="deskripsi" rows="4" required></textarea></td> 
            </tr>
            <tr>
                <td>Tenggat Waktu (Date Input)</td>
                <td>:</td>
                <td><input type="date" name="tenggat_waktu" required></td> 
            </tr>
            <tr>
                <td>Jenis Tugas (Radio Button)</td>
                <td>:</td>
                <td class="radio-group">
                    <input type="radio" id="individu" name="jenis_tugas" value="Individu" required>
                    <label for="individu">Individu</label>
                    <input type="radio" id="kelompok" name="jenis_tugas" value="Kelompok">
                    <label for="kelompok">Kelompok</label>
                    <input type="radio" id="proyek" name="jenis_tugas" value="Proyek">
                    <label for="proyek">Proyek</label>
                </td>
            </tr>
             <tr>
                <td>File Lampiran (File Upload)</td>
                <td>:</td>
                <td><input type="file" name="file_lampiran"></td> 
            </tr>
            <tr>
                <td>Status (Dropdown/Select)</td>
                <td>:</td>
                <td>
                    <select name="status" required>
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="simpan" value="Simpan Tugas">
                    <input type="reset" value="Batal">
                    <a href="dashboard.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>