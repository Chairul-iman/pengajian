<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_dokumentasi = $_POST['no_dokumentasi'];
    $no_kajian = $_POST['no_kajian'];
    $username = $_POST['username'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $gambar = basename($_FILES["gambar"]["name"]);

    $conn = new mysqli("localhost", "root", "", "krmk");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO dokumentasi (no_dokumentasi, gambar, no_kajian, username) VALUES ('$no_dokumentasi', '$gambar', '$no_kajian', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: kelola_dokumentasi.php");
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
    <title>Tambah Dokumentasi</title>
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
            <h2>Tambah Dokumentasi</h2>
            <a href="kelola_dokumentasi.php">Kembali ke Halaman Dokumentasi</a>
            <br><br>
            <form action="tambah_dokumentasi.php" method="post" enctype="multipart/form-data">
                <label for="no_dokumentasi">No Dokumentasi:</label>
                <input type="text" id="no_dokumentasi" name="no_dokumentasi" required><br><br>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" required><br><br>
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" required><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <input type="submit" value="Tambah Dokumentasi">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
