<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pengurus') {
    header('Location: index.php');
    exit();
}

include ('koneksi.php');

//memanggil dan menampilkan semua data yg ada di tabel
$sql = "SELECT * FROM dokumentasi";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokumentasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            padding: 8px;
        }

        table img {
            width: 50px;
            height: auto;
        }

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
</style>

<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak (KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Dokumentasi Kegiatan KRMK</h2>
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>No Dokumentasi</th>
                        <th>No Kajian</th>
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
                                        <a href='edit_dokumentasi.php?id=" . $row["id"] . "'>Ubah</a>
                                        <a href='delete_dokumentasi.php?id=" . $row["id"] . "'>Hapus</a>
                                    </td>
                                    <td><img src='images/" . $row["gambar"] . "' alt='Gambar' width='100'></td>
                                    <td>" . $row["no_dokumentasi"]. "</td>
                                    <td>" . $row["no_kajian"]. "</td>
                                    <td>" . $row["username"]. "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <p><a href="tambah_dokumentasi.php" class="btn">Tambah Dokumentasi</a></p>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>

</html>
