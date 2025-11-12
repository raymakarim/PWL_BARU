<?php

include "config.php";

$nama_pembeli = $_POST['nama'];
$email_pembeli = $_POST['email'];
$id_event = $_POST['event_id'];
$total_tiket = $_POST['jumlah'];

$sql = "INSERT INTO pembelian (event_id, nama_pembeli, email_pembeli, total_tiket) 
        VALUES ('$id_event', '$nama_pembeli', '$email_pembeli', '$total_tiket');";

$sql_kuota = "SELECT kuota FROM events WHERE id = '$id_event'";
$result_kuota = mysqli_query($conn, $sql_kuota);

$data_event = mysqli_fetch_assoc($result_kuota);
$kuota_tersedia = $data_event['kuota'];
if ($kuota_tersedia >= $total_tiket) {

    $sql_update = "UPDATE events SET kuota = kuota - $total_tiket WHERE id = '$id_event'";
    $query_update = mysqli_query($conn, $sql_update);
    
    if ($query_update) {
        $kode_tiket = "TIX-" . strtoupper(substr(md5(time() . $id_event), 0, 8));
        
        $sql_insert = "INSERT INTO pembelian (event_id, nama_pembeli, email_pembeli, total_tiket, kode_tiket) 
                       VALUES ('$id_event', '$nama_pembeli', '$email_pembeli', '$total_tiket', '$kode_tiket')";
        
        $query_insert = mysqli_query($conn, $sql_insert);
        
        if ($query_insert) {
            echo "<h2><span class='sukses'>✅ Pembelian Tiket Berhasil!</span></h2>";
            echo "<p>Terima kasih, $nama_pembeli. Berikut detail pembelian Anda:</p>";
            echo "<p><strong>Kode Tiket Anda adalah:</strong> <span class='sukses'>$kode_tiket</span></p>";
            echo "<p><strong>Jumlah Tiket:</strong> $total_tiket</p>";
        } else {
            echo "<h2><span class='gagal'>❌ Pembelian Gagal</span></h2>";
            echo "<p>Error saat menyimpan data pembelian: " . mysqli_error($conn) . "</p>";
        }
        
    } else {
        echo "<h2><span class='gagal'>❌ Pembelian Gagal</span></h2>";
        echo "<p>Error saat memperbarui kuota event: " . mysqli_error($conn) . "</p>";
    }
    
} else {
    echo "<h2><span class='gagal'>❌ Pembelian Gagal</span></h2>";
    echo "<p>Mohon maaf, tiket untuk event ini hanya tersisa **$kuota_tersedia** tiket. Permintaan Anda ($total_tiket) tidak dapat dipenuhi.</p>";
}
echo "<br><a href='index.php'>Kembali ke Daftar Events</a>";
echo "</body></html>";
?>

