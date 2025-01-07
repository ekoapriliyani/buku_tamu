<?php
require 'functions.php';

$tamu = query("SELECT * FROM tbl_tamu");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Bevananda</title>
</head>

<body>
    <h2>Buku Tamu Bevananda</h2>
    <a href="tamu_in.php"><button>Tamu Sudah Check In</button></a>
    <a href="tamu_out.php"><button>Tamu Sudah Check Out</button></a>
    <br><br>
    <a href="tambah.php">Tambah +</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>QR Code</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; ?>

        <?php foreach ($tamu as $row): ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["check_in"]; ?></td>
                <td><?= $row["check_out"]; ?></td>
                <td></td>
                <td>
                    <a href="detail.php?id=<?= $row["id"]; ?>"><button>Detail</button></a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>