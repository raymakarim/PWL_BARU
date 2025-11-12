<?php
// File: config.php

// Detail Koneksi Database Anda
$servername = "localhost";
$username = "root";       
$password = "";           
$dbname = "db_responsi_0218"; // Sesuaikan dengan nama database Anda

// Membuat koneksi dan menyimpannya ke variabel $conn
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa Koneksi. Jika gagal, skrip dihentikan (die).
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error()); 
}
// echo "Koneksi berhasil!"; // Baris ini bisa dihilangkan setelah pengujian
?>