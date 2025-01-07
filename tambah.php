<?php
require 'functions.php';
if (isset($_POST["simpan"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil disimpan');
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

    <script>
        function disablePastDates() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("myDate").setAttribute("min", today);
        }
    </script>
    <title>Tambah Tamu</title>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tamu_in.php">Tamu Sudah Check In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tamu_out.php">Tamu Sudah Check Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card border-dark mb-3">
                    <div class="card-header text-center">
                        <h2>Tambah Tamu</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori :</label>
                                <select class="form-select" name="kategori">
                                    <option>REGULER</option>
                                    <option>VIP</option>
                                    <option>VVIP</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama :</label>
                                <input type="text" name="nama" id="nama" class="form-control" required autofocus placeholder="Jika Lebih dari 1 orang, contoh: SUGENG, JAMAL EFENDY, MICHAEL RONI">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="jmltamu">Jumlah Tamu :</label>
                                <input type="number" name="jmltamu" id="jmltamu" class="form-control">
                            </div> -->
                            <!-- <div class="mb-3">
                                <label for="meeting">Ruang Meeting :</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>--Pilih Ruang Meeting--</option>
                                    <option value="1">R01 (Kapasitas 4 orang)</option>
                                    <option value="2">R02 (Kapasitas 4 orang)</option>
                                    <option value="3">R03 (Kapasitas 20 orang)</option>
                                </select>
                            </div> -->

                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal/Instansi/PT :</label>
                                <input type="text" class="form-control" id="asal" name="asal" required placeholder="Masukkan Nama Instansi/Perusahaan. Contoh: KEMENTERIAN PUPR">
                            </div>
                            <div class="mb-3">
                                <label for="hp" class="form-label">No HP :</label>
                                <input type="text" class="form-control" id="hp" name="hp" required placeholder="Masukkan Nomor WA aktif">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email aktif">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat :</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Masukkan Alamat">
                            </div>

                            <div class="mb-3">
                                <label for="pic" class="form-label">Bertemu Dengan/PIC :</label>
                                <input type="text" class="form-control" id="pic" name="pic" required placeholder="Masukkan Nama PIC yang anda temui">
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi :</label>
                                <select class="form-select" name="lokasi">
                                    <option>PABRIK CIKARANG</option>
                                    <option>KANTOR SUNTER</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="keperluan" class="form-label">Keperluan :</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" required placeholder="Masukkan Keperluan">
                            </div>
                            <div class="mb-3">
                                <label for="tgl" class="form-label">Tanggal Kunjungan :</label>
                                <input type="date" class="form-control" id="myDate" name="tgl" onfocus="disablePastDates()" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="jamawal">Jam Kedatangan :</label>
                                <input type="time" class="form-control" id="jamawal" name="jamawal">
                            </div>
                            <div class="mb-3">
                                <label for="jamakhir">Jam Selesai :</label>
                                <input type="time" class="form-control" id="jamakhir" name="jamakhir">
                            </div> -->
                            <!-- <div class="mb-3">
                                <label for="waktu" class="form-label">Estimasi Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" required>
                            </div> -->

                            <div class="mb-3">
                                <label hidden for="check_in">Check In</label>
                                <input hidden type="text" name="check_in" id="check_in">
                            </div>
                            <div class="mb-3">
                                <label hidden for="check_out">Check Out</label>
                                <input hidden type="text" name="check_out" id="check_out">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="simpan" class="btn btn-success">Simpan Data Tamu</button>
                                <a href="index.php" class="btn btn-light">Batal</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <footer class="mt-5 text-center">
        <hr>
        <p>Develop by IT Bevananda Mustika &copy; 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>