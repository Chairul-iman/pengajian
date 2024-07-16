<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jamaah - Komunitas Remaja Muslim Krapyak (KRMK)</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="images/logo2.png" alt="KRMK Logo" class="logo">
            <h1>Komunitas Remaja Muslim Krapyak (KRMK)</h1>
            <p>"Membangun Pemuda Harapan Bangsa dengan Ilmu dan Taqwa"</p>
        </header>
        <main>
            <h2>Artikel Terbaru</h2>
            <a href="dashboard_jamaah.php">Kembali Ke Dashboard Jamaah</a>
            <div class="artikel-list">
                <table>
                    <thead>
                        <tr>
                            <th>No Artikel</th>
                            <th>Isi Artikel</th>
                            <th>Penulis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                       include ('koneksi.php');

                        // Query untuk mengambil artikel dari tabel artikel
                        $sql = "SELECT * FROM artikel ORDER BY no_artikel DESC LIMIT 5"; // hps

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $no=1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['no_artikel'] . "</td>";
                                echo "<td>" . nl2br($row['isi']) . "</td>"; // Gunakan nl2br untuk mempertahankan format paragraf
                                echo "<td>" . $row['username'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Belum ada artikel yang ditambahkan.</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
