<?php
// Koneksi ke database
include "functions.php";

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $conn->real_escape_string($_POST['role']);

    // Validasi duplikasi username atau email
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Username atau email sudah terdaftar');
                document.location.href='register.php';
            </script>";
    } else {
        // Insert ke database
        $insertQuery = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        if ($conn->query($insertQuery)) {
            echo "<script>
                alert('Selamat anda berhasil registrasi');
                document.location.href='login.php';
            </script>";
        } else {
            echo "Gagal registrasi: " . $conn->error;
        }
    }
}
