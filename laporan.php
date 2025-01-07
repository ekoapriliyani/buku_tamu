<?php
require 'functions.php';


$tamu = query("SELECT * FROM tbl_tamu_out ORDER BY id DESC");


if (isset($_POST['export'])) {
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    // Validasi input tanggal
    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $query = "SELECT * FROM tbl_tamu_out WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id DESC";
        $tamu = query($query);
        exportToExcel($tamu);
    } else {
        echo "<script>alert('Harap pilih tanggal awal dan akhir.');</script>";
    }
} else {
    $tamu = query("SELECT * FROM tbl_tamu_out ORDER BY id DESC");
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
                        <a class="nav-link" href="tamu_out.php">Tamu Sudah Check Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="laporan.php">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <h4 class="text-center">Laporan</h4>
    <form action="" method="post">
        <div class="row mr-2">
            <div class="col-2">
                <input class="form-control" type="date" name="tgl_awal" id="tgl_awal">
            </div>
            <div class="col-2">
                <p>sampai dengan :</p>
            </div>

            <div class="col-2">
                <input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir">
            </div>
            <div class="col-2">
                <button class="btn btn-success" type="submit" name="export">Export</button>
            </div>
        </div>
    </form>



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