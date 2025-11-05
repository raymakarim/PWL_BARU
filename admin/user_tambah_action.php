<?php

include "config.php";

$user = $_POST['username'];
$pass = $_POST['password'];
$nama = $_POST['namalengkap'];
$email = $_POST['email'];

$sql = "INSERT INTO user (user_nama, user_password, user_namalengkap, user_email) 
        VALUES ('$user', '$pass', '$nama', '$email');";

$hasil = mysqli_query($config, $sql);

if($hasil){
    echo "Data berhasil ditambahkan";
}else{
    echo "Data gagal disimpan";
}

?>
<br>kembali ke <a href="halamanuser2.php">halaman user</a>