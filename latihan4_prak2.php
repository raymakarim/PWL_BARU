<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Form Biodata Mahasiswa</h2>

        <form action="result.php" method="POST">
            <label>Nama Anda:</label>
            <input type="text" name="nama" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Jenis Kelamin:</label>
            <div class="gender">
                <?php 
                    echo '<input type="radio" name="gender" value="Laki-laki" required> Laki-laki';
                    echo '<input type="radio" name="gender" value="Perempuan"> Perempuan';
                ?>
            </div>

            <label>NIM:</label>
            <input type="text" name="nim" required>

            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" required>

            <label>Program Studi:</label>
            <select name="prodi" required>
                <?php
                    $prodiList = [
                        "Sistem Informasi",
                        "Informatika",
                        "Manajemen Informatika"
                    ];

                    foreach ($prodiList as $prodi) {
                        echo "<option value='$prodi'>$prodi</option>";
                    }
                ?>
            </select>

            <div class="btns">
                <button type="submit">Hitung Usia</button>
                <button type="reset" class="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
