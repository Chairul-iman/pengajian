<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kajian = $_POST['no_kajian'];
    $tema = $_POST['tema'];
    $tempat = $_POST['tempat'];
    $pengisi = $_POST['pengisi'];
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $conn = new mysqli("localhost", "root", "", "krmk");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO jadwal_kajian (no_kajian, tema, tempat, pengisi, gambar) VALUES ('$no_kajian', '$tema', '$tempat', '$pengisi', '$gambar')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: kelola_jadwal.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Kajian</title>
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
            <h2>Tambah Jadwal Kajian</h2>
            
            <form action="tambah_jadwal.php" method="post" enctype="multipart/form-data">
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <br><br>
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" required><br><br>
                <label for="tema">Tema:</label>
                <input type="text" id="tema" name="tema" required><br><br>
                <label for="tempat">Tempat:</label>
                <input type="text" id="tempat" name="tempat" required><br><br>
                <label for="pengisi">Pengisi:</label>
                <input type="text" id="pengisi" name="pengisi" required><br><br>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" required><br><br>
                <input type="submit" value="Tambah Jadwal">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
