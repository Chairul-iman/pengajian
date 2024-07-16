<?php
session_start();

//utk mengoneksikan ke koneksi.php
include ('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Untuk verivikasi hass pw
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] == 'pengurus') {
                header('Location: dashboard_pengurus.php');
                exit();
            } else {
                header('Location: dashboard_jamaah.php');
                exit();
            }
        } else {
            //jika pw salah
            $error = "Password salah.";
            header("Location: login.php?error=" . urlencode($error));
            exit();
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
}

$conn->close();
?>
