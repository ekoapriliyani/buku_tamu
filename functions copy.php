<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';




// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "buku_tamu");

// query tampil data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function tambah($data)
{
    global $conn;
    $kode_booking = strtoupper(bin2hex(random_bytes(5)));
    $kategori = $data["kategori"];
    $nama = $data["nama"];
    $asal = $data["asal"];
    $hp = $data["hp"];
    $email = $data["email"];
    $alamat = $data["alamat"];
    $pic = $data["pic"];
    $lokasi = $data["lokasi"];
    $keperluan = $data["keperluan"];
    $tgl = $data["tgl"];
    $check_in = $data["check_in"];
    $check_out = $data["check_out"];

    $query = "INSERT INTO tbl_tamu VALUES
    ('',
     '$kode_booking', 
     '$kategori', 
     '$nama', 
     '$asal', 
     '$hp', 
     '$email', 
     '$alamat', 
     '$pic', 
     '$lokasi', 
     '$keperluan', 
     '$tgl', 
     '$check_in', 
     '$check_out')";
    mysqli_query($conn, $query);

    // sekalian kirim email

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tamu.bevananda@gmail.com';                     //SMTP username
        $mail->Password   = 'wdwbalmobrrwkxds';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $url = "http://192.168.0.76/info_tamu/index.php";

        $mail->setFrom('tamu.bevananda@gmail.com', 'Tamu Bevananda');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addCC('general.affair@bevananda.com');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Buku Tamu Bevananda';
        $mail->Body    = "Halo, {$nama}. Selamat Datang di <b>PT Bevananda Mustika.</b><br>Silahkan kunjungi link berikut untuk mengetahui lingkungan PT Bevananda Mustika. <a href=\"$url\">Klik Disini</a>. <br> ID Kunjungan : {$kode_booking} <br> Bertemu dengan : {$pic} <br> Tanggal Kunjungan : {$tgl} <br><br> Thanks, <br> Customer Service Care <br><b>PT Bevananda Mustika</b>";
        $mail->AltBody = '';
        $mail->addAttachment('img/EB50E49ED6.png');

        $mail->send();
        echo '<script>
        alert("Berhasil kirim email");
    </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // kirim ke WhatsApps
    $target = $hp;
    $token = "tfBLgEnWwXj7fQnjQvdH";
    $pesan = "Halo, *{$nama}*.\n" .
        "Selamat Datang di PT Bevananda Mustika\n" .
        "Silahkan kunjungi link berikut untuk mengetahui lingkungan PT Bevananda Mustika\n" .
        "https://www.youtube.com/watch?v=Q_OFBOZtupA\n" .
        "ID Kunjungan: *{$kode_booking}*\n" .
        "Bertemu dengan: *{$pic}*\n" .
        "Tanggal Kunjungan: *{$tgl}*\n" .
        "Lokasi: *{$lokasi}*";


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => $pesan,
            'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token" //change TOKEN to your actual token
        ),
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_msg)) {
        echo $error_msg;
    }
    echo $response;

    return mysqli_affected_rows($conn);
}

// detail
function detail($data)
{
    date_default_timezone_set("Asia/Bangkok");
    global $conn;
    $id = $data["id"];
    $kode_booking = $data["kode_booking"];
    $kategori = $data["kategori"];
    $nama = $data["nama"];
    $asal = $data["asal"];
    $hp = $data["hp"];
    $email = $data["email"];
    $alamat = $data["alamat"];
    $pic = $data["pic"];
    $lokasi = $data["lokasi"];
    $keperluan = $data["keperluan"];
    $tgl = $data["tgl"];
    $check_in = date('H:i:s');
    $check_out = $data["check_out"];

    $query = "UPDATE tbl_tamu SET
        kode_booking = '$kode_booking',
        kategori = '$kategori',
        nama = '$nama',
        asal = '$asal',
        hp = '$hp',
        email = '$email',
        alamat = '$alamat',
        pic = '$pic',
        lokasi = '$lokasi',
        keperluan = '$keperluan',
        tgl = '$tgl',
        check_in = '$check_in',
        check_out = '$check_out'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    $query2 = "INSERT INTO tbl_tamu_in VALUES
    ('',
     '$kode_booking', 
     '$kategori', 
     '$nama', 
     '$asal', 
     '$hp', 
     '$email', 
     '$alamat', 
     '$pic', 
     '$lokasi', 
     '$keperluan', 
     '$tgl', 
     '$check_in', 
     '$check_out')";
    mysqli_query($conn, $query2);
    mysqli_query($conn, "DELETE FROM tbl_tamu WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// detail 2
function detail2($data)
{
    date_default_timezone_set("Asia/Bangkok");
    global $conn;
    $id = $data["id"];
    $kode_booking = $data["kode_booking"];
    $kategori = $data["kategori"];
    $nama = $data["nama"];
    $asal = $data["asal"];
    $hp = $data["hp"];
    $email = $data["email"];
    $alamat = $data["alamat"];
    $pic = $data["pic"];
    $lokasi = $data["lokasi"];
    $keperluan = $data["keperluan"];
    $tgl = $data["tgl"];
    $check_in = $data["check_in"];
    $check_out = date('H:i:s');

    $query = "UPDATE tbl_tamu SET
        kode_booking = '$kode_booking',
        kategori = '$kategori',
        nama = '$nama',
        asal = '$asal',
        hp = '$hp',
        email = '$email',
        alamat = '$alamat',
        pic = '$pic',
        lokasi = '$lokasi',
        keperluan = '$keperluan',
        tgl = '$tgl',
        check_in = '$check_in',
        check_out = '$check_out'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    $query2 = "INSERT INTO tbl_tamu_out VALUES
    ('',
     '$kode_booking', 
     '$kategori', 
     '$nama', 
     '$asal', 
     '$hp', 
     '$email', 
     '$alamat', 
     '$pic', 
     '$lokasi', 
     '$keperluan', 
     '$tgl', 
     '$check_in', 
     '$check_out')";
    mysqli_query($conn, $query2);
    mysqli_query($conn, "DELETE FROM tbl_tamu_in WHERE id = $id");

    return mysqli_affected_rows($conn);
}
