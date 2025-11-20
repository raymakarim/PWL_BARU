<?php
session_start();
if($_SESSION['status'] != 'login'){
    header("Location: login.php?pesan=belum_login");
    exit;
}
include 'config.php';

// TIDAK ADA mysqli_real_escape_string()
$id_tugas = $_GET['id'];
$sql = "SELECT * FROM tugas WHERE id = '$id_tugas'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data Tugas tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

$jenis_tugas_options = ['Individu', 'Kelompok', 'Proyek'];
$status_options = ['Belum Selesai', 'Sedang Dikerjakan', 'Selesai'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h3 { color: #007bff; }
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        td { padding: 8px; }
        input[type="text"], input[type="date"], textarea, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px; background-color: #ffc107; color: black; }
        .radio-group label { margin-right: 15px; }
        .file-info { margin-top: 5px; font-size: 0.9em; color: #555; }
    </style>
</head>
<body>
    <h3>Edit Tugas: <?php echo $data['nama_tugas']; ?></h3>
    <form method="POST" action="proses_tugas.php" enctype="multipart/form-data"> 
        <input type="hidden" name="id_tugas" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="old_file" value="<?php echo $data['file_lampiran']; ?>">
        <table>
            <tr>
                <td>Nama Tugas</td>
                <td>:</td>
                <td><input type="text" name="nama_tugas" value="<?php echo $data['nama_tugas']; ?>" required></td>
            </tr>
            <tr>
                <td>Mata Kuliah</td>
                <td>:</td>
                <td><input type="text" name="mata_kuliah" value="<?php echo $data['mata_kuliah']; ?>" required></td>
            </tr>
            <tr>
                <td>Deskripsi Tugas</td>
                <td>:</td>
                <td><textarea name="deskripsi" rows="4" required><?php echo $data['deskripsi']; ?></textarea></td>
            </tr>
            <tr>
                <td>Tenggat Waktu</td>
                <td>:</td>
                <td><input type="date" name="tenggat_waktu" value="<?php echo $data['tenggat_waktu']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Tugas</td>
                <td>:</td>
                <td class="radio-group">
                    <?php foreach ($jenis_tugas_options as $option): ?>
                        <input type="radio" id="<?php echo strtolower($option); ?>" name="jenis_tugas" value="<?php echo $option; ?>" <?php echo ($data['jenis_tugas'] == $option) ? 'checked' : ''; ?> required>
                        <label for="<?php echo strtolower($option); ?>"><?php echo $option; ?></label>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>File Lampiran</td>
                <td>:</td>
                <td>
                    <input type="file" name="file_lampiran">
                    <?php if ($data['file_lampiran']): ?>
                        <div class="file-info">File saat ini: **<?php echo basename($data['file_lampiran']); ?>**. Kosongkan jika tidak ingin diubah.</div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <select name="status" required>
                        <?php foreach ($status_options as $option): ?>
                            <option value="<?php echo $option; ?>" <?php echo ($data['status'] == $option) ? 'selected' : ''; ?>><?php echo $option; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="edit" value="Simpan Perubahan">
                    <a href="dashboard.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>