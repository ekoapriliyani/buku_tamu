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
        echo "Username atau email sudah terdaftar!";
    } else {
        // Insert ke database
        $insertQuery = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        if ($conn->query($insertQuery)) {
            echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
        } else {
            echo "Gagal registrasi: " . $conn->error;
        }
    }
}
