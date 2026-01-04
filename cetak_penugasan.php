<?php
require('fpdf186/fpdf.php');
include 'koneksi.php';

// Ambil ID dari URL (jika ada) untuk mencetak satu data spesifik saja
$id_filter = isset($_GET['id']) ? $_GET['id'] : '';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,'LAPORAN PENUGASAN RELAWAN',0,1,'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFillColor(230, 230, 230); // Warna abu-abu muda untuk header
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'No',1,0,'C',true);
$pdf->Cell(50,10,'Nama Relawan',1,0,'C',true);
$pdf->Cell(50,10,'Lokasi',1,0,'C',true);
$pdf->Cell(35,10,'Tanggal',1,0,'C',true);
$pdf->Cell(45,10,'Keterangan',1,1,'C',true);

// Data dari VIEW Penugasan
$pdf->SetFont('Arial','',10);
$no = 1;

// Jika ada ID dikirim, tampilkan data itu saja. Jika tidak, tampilkan semua (Urut terbaru).
if ($id_filter != '') {
    // Pastikan nama kolom 'id_penugasan' sesuai dengan yang ada di View kamu
    $query = mysqli_query($conn, "SELECT * FROM view_laporan_penugasan WHERE id_penugasan = '$id_filter'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM view_laporan_penugasan ORDER BY tgl_tugas DESC");
}

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $pdf->Cell(10,10,$no++,1,0,'C');
        $pdf->Cell(50,10,$row['nama_relawan'],1,0,'L');
        $pdf->Cell(50,10,$row['nama_lokasi'],1,0,'L');
        $pdf->Cell(35,10,$row['tgl_tugas'],1,0,'C');
        // Gunakan MultiCell jika keterangan sangat panjang, tapi sementara pakai Cell dulu
        $pdf->Cell(45,10,isset($row['keterangan']) ? $row['keterangan'] : '-',1,1,'L');
    }
} else {
    $pdf->Cell(190,10,'Data tidak ditemukan',1,1,'C');
}

$pdf->Output('I', 'Laporan_Penugasan.pdf'); // 'I' agar terbuka di browser (inline)
?>