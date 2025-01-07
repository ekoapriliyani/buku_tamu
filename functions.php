<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




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
        //$mail->addAttachment("img/37B57EEFAD.png");

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



// fungsi export excel
function exportToExcel($data)
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set Header
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'ID Tamu');
    $sheet->setCellValue('C1', 'Kategori');
    $sheet->setCellValue('D1', 'Nama Tamu');
    $sheet->setCellValue('E1', 'Asal');
    $sheet->setCellValue('F1', 'No HP');
    $sheet->setCellValue('G1', 'Email');
    $sheet->setCellValue('H1', 'Alamat');
    $sheet->setCellValue('I1', 'Bertemu dengan/PIC');
    $sheet->setCellValue('J1', 'Lokasi');
    $sheet->setCellValue('K1', 'Tanggal');
    $sheet->setCellValue('L1', 'Keperluan');
    $sheet->setCellValue('M1', 'Check In');
    $sheet->setCellValue('N1', 'Check Out');

    // Isi Data
    $rowNumber = 2;
    foreach ($data as $key => $row) {
        $sheet->setCellValue('A' . $rowNumber, $key + 1);
        $sheet->setCellValue('B' . $rowNumber, $row['kode_booking']);
        $sheet->setCellValue('C' . $rowNumber, $row['kategori']);
        $sheet->setCellValue('D' . $rowNumber, $row['nama']);
        $sheet->setCellValue('E' . $rowNumber, $row['asal']);
        $sheet->setCellValue('F' . $rowNumber, $row['hp']);
        $sheet->setCellValue('G' . $rowNumber, $row['email']);
        $sheet->setCellValue('H' . $rowNumber, $row['alamat']);
        $sheet->setCellValue('I' . $rowNumber, $row['pic']);
        $sheet->setCellValue('J' . $rowNumber, $row['lokasi']);
        $sheet->setCellValue('K' . $rowNumber, $row['keperluan']);
        $sheet->setCellValue('L' . $rowNumber, $row['tgl']);
        $sheet->setCellValue('M' . $rowNumber, $row['check_in']);
        $sheet->setCellValue('N' . $rowNumber, $row['check_out']);
        $rowNumber++;
    }

    // Buat file Excel
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Laporan_Tamu_' . date('Y-m-d_H-i-s') . '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    $writer->save('php://output');
    exit;
}
