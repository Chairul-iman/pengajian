<?php
include ('koneksi.php');

//memanggil dan menampilkan semua data yg ada di tabel
$sql = "SELECT * FROM rangkuman_ceramah";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Rangkuman Ceramah</title>
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

        table th {
            text-align: left;
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

<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak (KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Kelola Rangkuman</h2>
            <a href="dashboard_pengurus.php">Kembali ke Halaman Pengurus</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>No Resume</th>
                        <th>No Kajian</th>
                        <th>Tema</th>
                        <th>Rangkuman</th>
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
                                        <a href='edit_rangkuman.php?id=" . $row["id"] . "'>Ubah</a>
                                        <a href='delete_rangkuman.php?id=" . $row["id"] . "'>Hapus</a>
                                    </td>
                                    <td>" . $row["no_resume"]. "</td>
                                    <td>" . $row["no_kajian"]. "</td>
                                    <td>" . $row["tema"]. "</td>
                                    <td>" . $row["rangkuman"]. "</td>
                                    <td>" . $row["username"]. "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <p><a href="tambah_rangkuman.php" class="btn">Tambah Rangkuman</a></p>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
