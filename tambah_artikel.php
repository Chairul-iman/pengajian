<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_artikel = $_POST['no_artikel'];
    $isi = $_POST['isi'];
    $username = $_POST['username'];

    $conn = new mysqli("localhost", "root", "", "krmk");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO artikel (no_artikel, isi, username) VALUES ('$no_artikel', '$isi', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo "Artikel baru berhasil ditambahkan";
        header("Location: kelola_artikel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
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
            <h2>Tambah Artikel</h2>
            <form action="tambah_artikel.php" method="post">
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <br><br>
            
                <label for="no_artikel">No Artikel:</label>
                <input type="text" id="no_artikel" name="no_artikel" required><br><br>
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" required></textarea><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <input type="submit" value="Tambah Artikel">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
