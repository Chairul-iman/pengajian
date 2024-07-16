<?php
include ('koneksi.php');

//memanggil dan menampilkan semua data yg ada di tabel
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Artikel Terbaru</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #45a049;
            border: none;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 5px;
        }

        .btn:hover {
            background-color: #000000;
        }
</style>

<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak (KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Update Artikel</h2>
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>No Artikel</th>
                        <th>Isi</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no=1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $no++. "</td>
                                    <td>
                                        <a href='edit_artikel.php?id=" . $row["id"] . "'>Ubah</a>
                                        <a href='delete_artikel.php?id=" . $row["id"] . "'>Hapus</a>
                                    </td>
                                    <td>" . $row["no_artikel"]. "</td>
                                    <td>" . $row["isi"]. "</td>
                                    <td>" . $row["username"]. "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <p><a href="tambah_artikel.php" class="btn">Tambah Artikel</a></p>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
