<?php
require 'functions.php';

$id = $_GET["id"];

$tm = query("SELECT * FROM tbl_tamu_in WHERE id = $id")[0];

if (isset($_POST["check_in"])) {
    if (detail2($_POST) > 0) {
        echo "<script>
            alert('Data berhasil check out');
            document.location.href='index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Tamu</title>
</head>

<body>

    <h2>Detail Tamu yang masih di lokasi</h2>
    <form action="" method="post">
        <ul>
            <input hidden type="text" name="id" id="id" value="<?= $tm["id"]; ?>">
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $tm["nama"] ?>" readonly>
            </li>

            <label hidden for="check_in">Check In</label>
            <input hidden type="text" name="check_in" id="check_in" value="<?= $tm["check_in"]; ?>">

            <label hidden for="check_out">Check Out</label>
            <input hidden type="text" name="check_out" id="check_out">

            <li>
                <button type="submit" name="check_out">Check Out</button>
            </li>

        </ul>
    </form>
    <footer class="mt-5 text-center">
        <hr>
        <p>Develop by IT Bevananda Mustika &copy; 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>