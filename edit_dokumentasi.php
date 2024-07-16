<?php
$id = $_GET['id'];

include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_dokumentasi = $_POST['no_dokumentasi'];
    $no_kajian = $_POST['no_kajian'];
    $username = $_POST['username'];

    if ($_FILES["gambar"]["name"]) {
        $target_dir = "images/dokumentasi/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $gambar = basename($_FILES["gambar"]["name"]);

        $sql = "UPDATE dokumentasi SET no_dokumentasi='$no_dokumentasi', gambar='$gambar', no_kajian='$no_kajian', username='$username' WHERE id='$id'";
    } else {
        $sql = "UPDATE dokumentasi SET no_dokumentasi='$no_dokumentasi', no_kajian='$no_kajian', username='$username' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: kelola_dokumentasi.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM dokumentasi WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_dokumentasi = $row['no_dokumentasi'];
        $no_kajian = $row['no_kajian'];
        $username = $row['username'];
        $gambar = $row['gambar'];
    } else {
        echo "No record found";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokumentasi</title>
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
            <h2>Edit Dokumentasi</h2>
            <a href="kelola_dokumentasi.php">Kembali Ke Kelola Dokumentasi</a>
            <br><br>
            <form action="edit_dokumentasi.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <label for="no_dokumentasi">No Dokumentasi:</label>
                <input type="text" id="no_dokumentasi" name="no_dokumentasi" value="<?php echo $no_dokumentasi; ?>" required><br><br>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar"><br><br>
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" value="<?php echo $no_kajian; ?>" required><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
                <input type="submit" value="Update Dokumentasi">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
