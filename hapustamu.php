<?php
include 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "<script>
        alert('Tamu Berhasil dibatalkan');
        document.location.href='index.php';
    </script>";
}
