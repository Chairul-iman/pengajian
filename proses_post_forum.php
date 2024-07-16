<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pesan = $_POST['pesan'];
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

    // untuk menyimpan pesan ke database atau file

    //simpan pesan dlm file
    $file = 'pesan_forum.txt';
    $current = file_get_contents($file);
    $current .= "[" . date("Y-m-d H:i:s") . "] $username ($role): $pesan\n";
    file_put_contents($file, $current);

    
    header("Location: forum_diskusi.php");
    exit();
}
?>
