<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi</title>
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
    <h2>Forum Diskusi</h2>
    <a href="dashboard_jamaah.php">Kembali ke Halaman Jamaah</a>
    <br><br>
    <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
    <br><br>
    <form action="proses_post_forum.php" method="post">
        <label for="pesan">Tulis Pesan:</label><br>
        <textarea id="pesan" name="pesan" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Kirim Pesan">
    </form>
    
    <hr>
    <h3>Pesan-pesan Diskusi</h3>
    <div class="pesan-container">
        <?php
        // Ambil pesan-pesan dari file pesan_forum.txt
        $file = 'pesan_forum.txt';
        if (file_exists($file)) {
            $pesan = file($file);
            foreach ($pesan as $line) {
                echo "<p>$line</p>";
            }
        } else {
            echo "<p>Belum ada pesan.</p>";
        }
        ?>
    </div>
</main>

        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
