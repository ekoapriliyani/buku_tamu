<?php

$kode_booking = "EYUDH8NS";
$nama = "EKO";
$pic = "ROBERTUS";
$tgl = "11-11-2024";
$lokasi = "BEVA";
$pesan = "Halo, {$nama}.\n" .
    "Selamat Datang di PT Bevananda Mustika\n" .
    "Silahkan kunjungi link berikut untuk mengetahui lingkungan PT Bevananda Mustika\n" .
    "https://www.youtube.com/watch?v=Q_OFBOZtupA\n" .
    "ID Kunjungan: {$kode_booking}\n" .
    "Bertemu dengan: {$pic}\n" .
    "Tanggal Kunjungan: {$tgl}\n" .
    "Lokasi: {$lokasi}";

echo $pesan;
