<?php
require('fpdf.php');
$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'UNIVERSITAS PERANGKAT LUNAK',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR SISWA JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(22,6,'NIS',1,0);
$pdf->Cell(70,6,'NAMA SISWA',1,0);
$pdf->Cell(27,6,'NO HP',1,0);
$pdf->Cell(30,6,'JENIS KELAMIN',1,0);
$pdf->Cell(33,6,'ALAMAT',1,1); // Tambahkan 33 untuk menyesuaikan lebar kolom

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute();

while ($row = $sql->fetch()) {
    $pdf->Cell(22,6,$row['nis'],1,0);
    $pdf->Cell(70,6,$row['nama'],1,0);
    $pdf->Cell(27,6,$row['telp'],1,0);
    $pdf->Cell(30,6,$row['jenis_kelamin'],1,0);
    $pdf->MultiCell(33,6,$row['alamat'],1,1); // Menggunakan MultiCell untuk alamat agar pindah baris jika terlalu panjang
}

$pdf->Output();
?>
