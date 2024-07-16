<?php
$id = $_GET['id'];

include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_artikel = $_POST['no_artikel'];
    $isi = $_POST['isi'];
    $username = $_POST['username'];

    $sql = "UPDATE artikel SET no_artikel='$no_artikel', isi='$isi', username='$username' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Artikel berhasil diperbarui";
        header("Location: kelola_artikel.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM artikel WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_artikel = $row['no_artikel'];
        $isi = $row['isi'];
        $username = $row['username'];
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
    <title>Edit Artikel</title>
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
            <h2>Edit Artikel</h2>
            <a href="kelola_artikel.php">Kembali Ke Kelola Artikel</a>
            <br><br>
            <form action="edit_artikel.php?id=<?php echo $id; ?>" method="post">
                <label for="no_artikel">No Artikel:</label>
                <input type="text" id="no_artikel" name="no_artikel" value="<?php echo $no_artikel; ?>" required><br><br>
                <label for="isi">Isi:</label>
                <textarea id="isi" name="isi" required><?php echo $isi; ?></textarea><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
                <input type="submit" value="Update Artikel">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
