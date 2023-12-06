<?php
include "koneksi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mencegah SQL Injection
    $sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch();

    if($data) {
        // Hapus foto jika ada di folder
        if(is_file("images/".$data['foto'])) {
            unlink("images/".$data['foto']);
        }

        // Hapus data dari database
        $delete = $pdo->prepare("DELETE FROM siswa WHERE id=:id");
        $delete->bindParam(':id', $id);
        $delete->execute();

        header("location: index.php"); // Redirect ke halaman index.php
        exit();
    } else {
        echo "Data tidak ditemukan. <a href='index.php'>Kembali</a>";
    }
} else {
    echo "ID tidak ditemukan. <a href='index.php'>Kembali</a>";
}
?>
