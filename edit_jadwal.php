<?php
$id = $_GET['id'];

include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kajian = $_POST['no_kajian'];
    $tema = $_POST['tema'];
    $tempat = $_POST['tempat'];
    $pengisi = $_POST['pengisi'];
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $sql = "UPDATE jadwal_kajian SET no_kajian='$no_kajian', tema='$tema', tempat='$tempat', pengisi='$pengisi', gambar='$gambar' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: kelola_jadwal.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    $sql = "SELECT * FROM jadwal_kajian WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_kajian = $row['no_kajian'];
        $tema = $row['tema'];
        $tempat = $row['tempat'];
        $pengisi = $row['pengisi'];
        $gambar = $row['gambar'];
    } else {
        echo "Record not found";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Kajian</title>
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
            <h2>Edit Jadwal Kajian</h2>
            <a href="kelola_jadwal.php">Kembali Ke Kelola Jadwal</a>
            <br><br>
            <form action="edit_jadwal.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" value="<?php echo $no_kajian; ?>" required><br><br>
                <label for="tema">Tema:</label>
                <input type="text" id="tema" name="tema" value="<?php echo $tema; ?>" required><br><br>
                <label for="tempat">Tempat:</label>
                <input type="text" id="tempat" name="tempat" value="<?php echo $tempat; ?>" required><br><br>
                <label for="pengisi">Pengisi:</label>
                <input type="text" id="pengisi" name="pengisi" value="<?php echo $pengisi; ?>" required><br><br>
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar"><br><br>
                <input type="submit" value="Update Jadwal">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
