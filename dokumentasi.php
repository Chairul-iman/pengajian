<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan KRMK</title>
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
            <h2>Dokumentasi Kegiatan KRMK</h2>
            <a href="dashboard_jamaah.php">Kembali ke Halaman Jamaah</a>
            <br><br>
            <div class="gallery">
                <?php
                
                //mengoneksi ke koneksi.php
                include ('koneksi.php');

                $sql = "SELECT * FROM dokumentasi";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='gallery-item'>";
                        echo "<img src='images/" . $row['gambar'] . "' alt='Dokumentasi'>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No records found</p>";
                }

                $conn->close();
                ?>
            </div>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
