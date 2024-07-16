<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pengurus') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengurus</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        .btn {
            display: inline-block;
            padding: 5px 20px;
            font-size: 16px;
            color: white;
            background-color: #45a049;
            border: none;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
            <h2>Selamat datang <?php echo $_SESSION['username']; ?>, Anda Telah Login Sebagai Pengurus </h2>
            <nav>
                <ul>
                    <li><a href="kelola_jadwal.php">Kelola Jadwal Kajian</a></li>
                    <li><a href="tambah_pengurus.php">Tambahkan Pengurus baru</a></li>
                    <li><a href="kelola_rangkuman.php">Kelola Rangkuman Ceramah</a></li>
                    <li><a href="kelola_artikel.php">Kelola Artikel</a></li>
                    <li><a href="kelola_dokumentasi.php">Kelola Dokumentasi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </main>
        <h2>Assalamualaikum, Anda telah login sebagai pengurus.</h2>
            <p>Komunitas Kajian Remaja Muslim Krapyak ini adalah
               Salah satu komunitas dakwah di Krapyak yang didalamnya setiap anggota memurnikan visi,
               misi serta tujuan mereka meniti jalan takwa, serta tujuan tersebut ke dalam tindakan nyata.
               Dengan komunitas Kajian remaja muslim krapyak ini bergerak untuk meningkatkan akhlak agama dalam bidang ibadah, sosial, budaya, dsb.
            </p>
             <p>Visi kami adalah:</p>
            <ul>
            <li>Menjadi organisasi dakwah islam yang profesional dan berwawasan luas serta mengembangkan potensi insani dalam membangun manusia yang melaksanakan ibadah kepada Allah SWT.</li>
            </ul>
            <p>Misi:</p>
            <ul>
            <li>Memberikan kontribusi nyata dalam pembangunan bangsa dan agama melalui dakwah, pengkajian, pembinaan dan penguatan ajaran islam yang dilakukan secara menyeluruh, terintegrasi dan terus menerus, menuju terwujudnya generasi, pemuda harapan bangsa dalam wadah Sinergis Kemasatan Remaja Islam Krapyak.</li>
            </ul>
            
            <p><a href="kelola_artikel.php" class="btn">Update Artikel Terbaru !</a></p>
            <p><a href="forum_diskusi.php" class="btn">Forum Diskusi !</a></p>

        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
