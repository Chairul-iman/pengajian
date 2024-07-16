<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kajian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak(KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Jadwal Kajian</h2>
            <a href="dashboard_jamaah.php">Kembali ke Halaman Jamaah</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Tema</th>
                        <th>Tempat</th>
                        <th>Pengisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Konksi dtbase
                    include ('koneksi.php');

                    $sql = "SELECT * FROM jadwal_kajian";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td><img src='images/" . $row['gambar'] . "' alt='" . $row['tema'] . "' width='100'></td>";
                            echo "<td>" . $row['tema'] . "</td>";
                            echo "<td>" . $row['tempat'] . "</td>";
                            echo "<td>" . $row['pengisi'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
