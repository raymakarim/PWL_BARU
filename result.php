
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $nim = $_POST["nim"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $prodi = $_POST["prodi"];

    $lahir = new DateTime($tgl_lahir);
    $sekarang = new DateTime();
    $usia = $sekarang->diff($lahir)->y;
}
?>


<body>
    <div class="result-container">
        <h2>Hasil Biodata Mahasiswa</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($gender) ?></p>
            <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($tgl_lahir) ?></p>
            <p><strong>Usia:</strong> <?= $usia ?> tahun</p>
            <p><strong>Program Studi:</strong> <?= htmlspecialchars($prodi) ?></p>
            <a href="index.php" class="back-btn">Kembali ke Form</a>
        <?php else: ?>
            <p>Silakan isi form terlebih dahulu.</p>
            <a href="index.php" class="back-btn">Kembali</a>
        <?php endif; ?>
    </div>
</body>
</html>
