
<!DOCTYPE html>
<html lang="en"<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pengurus') {
    header('Location: index.php');
    exit();
}
?>
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengurus Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak (KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Tambah Pengurus Baru</h2>
            <form action="proses_tambah_pengurus.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Tambah Pengurus">
            </form>
            <br><br>
            <a href="dashboard_pengurus.php">Kenmbali Ke Halaman Pengurus</a>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
