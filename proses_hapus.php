<?php
// Include file koneksi.php untuk menghubungkan ke database
include "koneksi.php";

// Periksa jika parameter ID dikirim melalui URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data siswa berdasarkan ID
    $delete = $pdo->prepare("DELETE FROM siswa WHERE id=:id");
    $delete->bindParam(':id', $id);
    $delete->execute(); // Eksekusi query delete

    // Redirect kembali ke halaman utama (index.php)
    header("location: index.php");
    exit();
} else {
    echo "ID tidak ditemukan. <a href='index.php'>Kembali</a>";
}
?>
