<?php
require 'functions.php';
require 'lib/fpdf186/fpdf.php'; // library FPDF


$tamu = query("SELECT * FROM tbl_tamu_out ORDER BY id DESC");


if (isset($_POST['export'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    // Validasi input tanggal
    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $query = "SELECT * FROM tbl_tamu_out WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id DESC";
        $tamu = query($query);

        // Validasi jika data tidak ditemukan
        if (!empty($tamu)) {
            exportToExcel($tamu);
        } else {
            echo "<script>
                alert('Data tidak ditemukan untuk tanggal yang dipilih.');
                document.location.href='laporan.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Harap pilih tanggal awal dan akhir.');
            document.location.href='laporan.php';
        </script>";
    }
} else {
    $tamu = query("SELECT * FROM tbl_tamu_out ORDER BY id DESC");
}


// fungsi export
if (isset($_POST['export_pdf'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    // Validasi input tanggal
    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $query = "SELECT * FROM tbl_tamu_out WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id DESC";
        $tamu = query($query);

        if (!empty($tamu)) {
            // Generate PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(190, 10, 'Laporan Tamu PT Bevananda Mustika', 0, 1, 'C');
            $pdf->Ln(5);

            // Header tabel
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(10, 10, 'No', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Nama', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Tanggal', 1, 0, 'C');
            $pdf->Cell(90, 10, 'Keperluan', 1, 1, 'C');

            // Data tabel
            $pdf->SetFont('Arial', '', 12);
            $no = 1;
            foreach ($tamu as $row) {
                $pdf->Cell(10, 10, $no++, 1, 0, 'C');
                $pdf->Cell(50, 10, $row['nama'], 1, 0);
                $pdf->Cell(40, 10, $row['tgl'], 1, 0);
                $pdf->Cell(90, 10, $row['keperluan'], 1, 1);
            }

            // Output PDF
            $pdf->Output('D', 'Laporan_Tamu_' . date('Ymd') . '.pdf');
            exit;
        } else {
            echo "<script>
                alert('Data tidak ditemukan untuk tanggal yang dipilih.');
                document.location.href='laporan.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Harap pilih tanggal awal dan akhir.');
            document.location.href='laporan.php';
        </script>";
    }
}
