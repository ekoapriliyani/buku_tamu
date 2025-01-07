<?php
require 'functions.php';

$tamu = query("SELECT * FROM tbl_tamu");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <title>Buku Tamu Bevananda</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: #940707;" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Tamu PT Bevananda Mustika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tamu_in.php">Tamu Sudah Check In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tamu_out.php">Tamu Sudah Check Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <br>
    <a href="tambah.php" class="btn btn-primary">Tambah +</a>
    <br>
    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Tamu</th>
                <th>Kategori</th>
                <th style="width: 15%;">Nama Tamu</th>
                <th style="width: 15%;">Asal</th>
                <th style="width: 10%;">PIC</th>
                <th>Lokasi</th>
                <th hidden>Check In</th>
                <th hidden>Check Out</th>
                <th style="width: 10%;">Tanggal</th>
                <th>QR Code</th>
                <th style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>

            <?php foreach ($tamu as $row): ?>
                <?php
                require_once('lib/qrlib.php');
                $qrvalue = $row['kode_booking'];
                $tempDir = "img/";
                $codeContents = $qrvalue;
                $fileName = $qrvalue . ".png";
                $pngAbsoluteFilePath = $tempDir . $fileName;
                $urlRelativeFilePath = $tempDir . $fileName;
                if (!file_exists($pngAbsoluteFilePath)) {
                    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 4);
                }
                ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["kode_booking"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["asal"]; ?></td>
                    <td><?= $row["pic"]; ?></td>
                    <td><?= $row["lokasi"]; ?></td>
                    <td hidden><?= $row["check_in"]; ?></td>
                    <td hidden><?= $row["check_out"]; ?></td>
                    <td><?= $row["tgl"]; ?></td>
                    <td><img src="img/<?= $row["kode_booking"] . ".png"; ?>" width=""></td>
                    <td>
                        <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Validasi</a>
                        <a href="hapustamu.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('yakin batalkan tamu?');">Batal</a>
                        <a href="cetak_pdf.php?id=<?= $row["id"]; ?>" class="btn btn-success">Cetak PDF</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>



    <footer class="mt-5 text-center">
        <hr>
        <p>Develop by IT Bevananda Mustika &copy; 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $('#example').DataTable();
    </script>

</body>

</html>