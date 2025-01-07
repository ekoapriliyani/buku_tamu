<?php
require 'functions.php';
require 'lib/fpdf186/fpdf.php'; // Pastikan library FPDF sudah terpasang
require 'lib/qrlib.php'; // Library QR Code

// Periksa apakah ID tersedia di URL
if (!isset($_GET['id'])) {
    die("ID tamu tidak ditemukan!");
}

$id = $_GET['id'];
$tamu = query("SELECT * FROM tbl_tamu WHERE id = $id");

if (!$tamu) {
    die("Data tamu tidak ditemukan!");
}

$tamu = $tamu[0]; // Ambil data tunggal

// Lokasi penyimpanan QR Code sementara
$tempDir = 'img/';
$qrFileName = $tempDir . 'qrcode_' . $tamu['kode_booking'] . '.png';

// Hasilkan QR Code
QRcode::png($tamu['kode_booking'], $qrFileName, QR_ECLEVEL_L, 4);

// Buat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Tambahkan kop dengan logo
$pdf->Image('img/logo.png', 10, 10, 30); // Sesuaikan path dan ukuran logo
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'PT Bevananda Mustika', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Jl. Jati 2 Blok J5 No. 12, Newton Techno Park, Cikarang Selatan', 0, 1, 'C');
$pdf->Cell(0, 10, 'Email: info@bevananda.com | Telp: (021) 8973780', 0, 1, 'C');
$pdf->Ln(10);
$pdf->Cell(0, 0, '', 'T'); // Garis bawah kop
$pdf->Ln(10);

// Judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Data Tamu', 0, 1, 'C');
$pdf->Ln(10);

// Informasi Tamu
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'ID Tamu:', 0, 0);
$pdf->Cell(0, 10, $tamu['kode_booking'], 0, 1);
$pdf->Cell(50, 10, 'Nama:', 0, 0);
$pdf->Cell(0, 10, $tamu['nama'], 0, 1);
$pdf->Cell(50, 10, 'Kategori:', 0, 0);
$pdf->Cell(0, 10, $tamu['kategori'], 0, 1);
$pdf->Cell(50, 10, 'Asal:', 0, 0);
$pdf->Cell(0, 10, $tamu['asal'], 0, 1);
$pdf->Cell(50, 10, 'PIC:', 0, 0);
$pdf->Cell(0, 10, $tamu['pic'], 0, 1);
$pdf->Cell(50, 10, 'Lokasi:', 0, 0);
$pdf->Cell(0, 10, $tamu['lokasi'], 0, 1);
$pdf->Cell(50, 10, 'Tanggal:', 0, 0);
$pdf->Cell(0, 10, $tamu['tgl'], 0, 1);

// Tambahkan QR Code ke PDF
$pdf->Ln(10);
$pdf->Cell(0, 10, 'QR Code (Kode Booking):', 0, 1);
$pdf->Image($qrFileName, $pdf->GetX(), $pdf->GetY(), 50, 50);

// Output file PDF
$pdf->Output('I', 'data_tamu_' . $tamu['kode_booking'] . '.pdf');

// Hapus file QR Code sementara
unlink($qrFileName);
