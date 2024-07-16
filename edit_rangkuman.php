<?php
$id = $_GET['id'];

include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_resume = $_POST['no_resume'];
    $no_kajian = $_POST['no_kajian'];
    $tema = $_POST['tema'];
    $rangkuman = $_POST['rangkuman'];
    $username = $_POST['username'];

    $sql = "UPDATE rangkuman_ceramah SET no_resume='$no_resume', no_kajian='$no_kajian', tema='$tema', rangkuman='$rangkuman', username='$username' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: kelola_rangkuman.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM rangkuman_ceramah WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_resume = $row['no_resume'];
        $no_kajian = $row['no_kajian'];
        $tema = $row['tema'];
        $rangkuman = $row['rangkuman'];
        $username = $row['username'];
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
    <title>Edit Rangkuman Ceramah</title>
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
            <h2>Edit Rangkuman Ceramah</h2>
            <a href="kelola_rangkuman.php">Kembali Ke Kelola Rangkuman</a>
            <br><br>
            <form action="edit_rangkuman.php?id=<?php echo $id; ?>" method="post">
                <label for="no_resume">No Resume:</label>
                <input type="text" id="no_resume" name="no_resume" value="<?php echo $no_resume; ?>" required><br><br>
                <label for="no_kajian">No Kajian:</label>
                <input type="text" id="no_kajian" name="no_kajian" value="<?php echo $no_kajian; ?>" required><br><br>
                <label for="tema">Tema:</label>
                <input type="text" id="tema" name="tema" value="<?php echo $tema; ?>" required><br><br>
                <label for="rangkuman">Rangkuman:</label>
                <textarea id="rangkuman" name="rangkuman" required><?php echo $rangkuman; ?></textarea><br><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
                <input type="submit" value="Update Rangkuman">
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
