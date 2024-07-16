<?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'pengurus') {
        header('Location: dashboard_pengurus.php');
        exit();
    } else {
        header('Location: dashboard_jamaah.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
