<?php

include 'config.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$login = mysqli_query($conn, $sql);

$cek = mysqli_num_rows($login);

if($cek > 0){
    session_start();
    $data = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard.php"); // Arahkan ke dashboard.php
} else {
    // Kembali ke halaman login jika gagal
    header("location:login.php?pesan=gagal"); 
}
?>