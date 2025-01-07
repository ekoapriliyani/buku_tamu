<?php
require '../functions.php';

$id = $_GET["id"];

$tm = query("SELECT * FROM tbl_tamu WHERE id = $id")[0];

if (isset($_POST["check_in"])) {
    if (detail($_POST) > 0) {
        echo "<script>
            alert('Data berhasil check in');
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
    <div class="container">
        <h4 class="text-center">Detail Tamu</h4>
        <form action="" method="post">
            <input hidden type="text" name="id" id="id" value="<?= $tm["id"]; ?>">
            <div class="mb-3 text-center">
                <img src="../img/<?= $tm["kode_booking"] . ".png"; ?>" width="200px" class="inline-block">
                <h4><?= $tm["kode_booking"]; ?></h4>
            </div>
            <div class="mb-3">
                <label hidden for="kode_booking" class="form-label">Kode Booking :</label>
                <input hidden type="text" name="kode_booking" id="kode_booking" class="form-control" value="<?= $tm["kode_booking"]; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori :</label>
                <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $tm["kategori"]; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $tm["nama"]; ?>">
            </div>
            <div class="mb-3">
                <label for="asal" class="form-label">Asal/Instansi/PT :</label>
                <input type="text" class="form-control" id="asal" name="asal" value="<?= $tm["asal"]; ?>">
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No HP :</label>
                <input type="text" class="form-control" id="hp" name="hp" value="<?= $tm["hp"]; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $tm["email"]; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat :</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tm["alamat"]; ?>">
            </div>

            <div class="mb-3">
                <label for="pic" class="form-label">Bertemu Dengan/PIC :</label>
                <input type="text" class="form-control" id="pic" name="pic" value="<?= $tm["pic"]; ?>">
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi :</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $tm["lokasi"]; ?>">
            </div>
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan :</label>
                <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $tm["keperluan"]; ?>">
            </div>
            <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal Kunjungan :</label>
                <input type="text" class="form-control" id="tgl" name="tgl" value="<?= $tm["tgl"]; ?>" readonly>
            </div>



            <label hidden for="check_in">Check In</label>
            <input hidden type="text" name="check_in" id="check_in">

            <label hidden for="check_out">Check Out</label>
            <input hidden type="text" name="check_out" id="check_out">


            <button class="btn btn-success mr-5" type="submit" name="check_in" onclick="return confirm('Pastikan Tamu sudah mendapatkan Kartu Visitor');">Check In</button>
            <a class="btn btn-light" href="index.php">Kembali</a>
        </form>
    </div>


    <footer class="mt-5 text-center">
        <hr>
        <p>Develop by IT Bevananda Mustika &copy; 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>