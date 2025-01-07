<?php
require 'functions.php';

$tamu = query("SELECT * FROM tbl_tamu_out ORDER BY id DESC");

// Export ke Excel
if (isset($_POST['export_excel'])) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=data_tamu_out.xls");

    echo "No\tID Tamu\tKategori\tNama Tamu\tAsal\tPIC\tLokasi\tTanggal\tCheck In\tCheck Out\n";

    $no = 1;
    foreach ($tamu as $row) {
        echo $no . "\t" . $row['kode_booking'] . "\t" . $row['kategori'] . "\t" . $row['nama'] . "\t" . $row['asal'] . "\t" . $row['pic'] . "\t" . $row['lokasi'] . "\t" . $row['tgl'] . "\t" . $row['check_in'] . "\t" . $row['check_out'] . "\n";
        $no++;
    }
    exit;
}

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
            <a class="navbar-brand" href="index.php">Aplikasi Tamu PT Bevananda Mustika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tamu_in.php">Tamu Sudah Check In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tamu_out.php">Tamu Sudah Check Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h4 class="text-center">Tamu Sudah Check Out</h4>
    <!-- Tombol Export ke Excel -->
    <!-- <div class="container text-end mb-3">
        <form method="post">
            <button type="submit" name="export_excel" class="btn btn-success">Export ke Excel</button>
        </form>
    </div> -->

    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Tamu</th>
                <th>Kategori</th>
                <th>Nama Tamu</th>
                <th>Asal</th>
                <th>Bertemu dengan/PIC</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Check In</th>
                <th>Check Out</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tamu as $row): ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["kode_booking"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["asal"]; ?></td>
                    <td><?= $row["pic"]; ?></td>
                    <td><?= $row["lokasi"]; ?></td>
                    <td><?= $row["tgl"]; ?></td>
                    <td><?= $row["check_in"]; ?></td>
                    <td><?= $row["check_out"]; ?></td>
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