<?php
require('fpdf186/fpdf.php');
include 'koneksi.php';

$pdf = new FPDF('L','mm','A4'); // L = Landscape (biar lebih lebar)
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial','B',14);
$pdf->Cell(277,10,'LAPORAN PENGELUARAN LOGISTIK',0,1,'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0,'C');
$pdf->Cell(40,10,'Tanggal',1,0,'C');
$pdf->Cell(80,10,'Lokasi Penugasan',1,0,'C');
$pdf->Cell(80,10,'Nama Barang',1,0,'C');
$pdf->Cell(30,10,'Jumlah',1,1,'C');

// Data dari VIEW Logistik
$pdf->SetFont('Arial','',10);
$no = 1;
$query = mysqli_query($conn, "SELECT * FROM view_laporan_logistik");
while ($row = mysqli_fetch_assoc($query)) {
    $pdf->Cell(10,10,$no++,1,0,'C');
    $pdf->Cell(40,10,$row['tgl_tugas'],1,0,'C');
    $pdf->Cell(80,10,$row['nama_lokasi'],1,0,'L');
    $pdf->Cell(80,10,$row['nama_barang'],1,0,'L');
    $pdf->Cell(30,10,$row['jumlah_keluar'],1,1,'C');
}

$pdf->Output();
?>