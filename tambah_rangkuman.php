<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_resume = $_POST['no_resume'];
    $no_kajian = $_POST['no_kajian'];
    $tema = $_POST['tema'];
    $rangkuman = $_POST['rangkuman'];
    $username = $_POST['username'];

    // Buat koneksi ke database
    $conn = new mysqli("localhost", "root", "", "krmk");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO rangkuman_ceramah (no_resume, no_kajian, tema, rangkuman, username) 
            VALUES ('$no_resume', '$no_kajian', '$tema', '$rangkuman', '$username')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil disimpan, arahkan ke halaman kelola_rangkuman.php
        header("Location: kelola_rangkuman.php");
        exit(); // Pastikan exit untuk menghentikan eksekusi skrip selanjutnya
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
    <title>Tambah Rangkuman Ceramah</title>
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
            <h2>Tambah Rangkuman Ceramah</h2>
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <br><br>
            <form action="tambah_rangkuman.php" method="post">
                <label for="no_resume">No Resume:</label>
                <input type="text" id="no_resume" name="no_resume" required><br><br>
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" required><br><br>
                <label for="tema">Tema:</label>
                <input type="text" id="tema" name="tema" required><br><br>
                <label for="rangkuman">Rangkuman:</label>
                <textarea id="rangkuman" name="rangkuman" required></textarea><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <input type="submit" value="Tambah Rangkuman">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
