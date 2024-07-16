<?php
// proses_register_jamaah.php

include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah username sudah ada
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username '$username' sudah ada. Silakan pilih username lain.<br>";
    } else {
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'jamaah')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "Pendaftaran berhasil. Anda dapat login sekarang.<br>";
            echo "<a href='index.php'>Login</a>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
    }

    $stmt->close();
}

$conn->close();
?>
