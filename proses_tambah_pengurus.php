<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pengurus') {
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    include ('koneksi.php');

    // Periksa apakah username sudah ada
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username '$username' sudah ada. <a href='tambah_pengurus.php'>Kembali</a>";
    } else {
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'pengurus')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "Pengurus '$username' berhasil ditambahkan. <a href='dashboard_pengurus.php'>Kembali ke Dashboard</a>";
        } else {
            echo "Error: " . $stmt->error . "<br><a href='tambah_pengurus.php'>Kembali</a>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
