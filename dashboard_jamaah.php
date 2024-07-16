<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'jamaah') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jamaah</title>
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
            <h2>Assalamualaikum <?php echo $_SESSION['username']; ?>, Anda Telah Login Sebagai Jamaah.</h2>
            <nav>
                <ul>
                    <li><a href="jadwal_kajian.php">Jadwal Kajian</a></li>
                    <li><a href="resume_kajian.php">Rangkuman Ceramah</a></li>
                    <li><a href="dokumentasi.php">Dokumentasi</a></li>
                    <li><a href="artikel.php">Artikel Terbaru</a></li>
                    <li><a href="forum_diskusi.php">Forum Diskusi</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <p>
                Komunitas Kajian Remaja Muslim Krapyak ini adalah Salah satu komunitas dakwah di Karawang yang didalamnya setiap anggota menunaikan visi,
                misi serta tujuan mereka merealisasikan visi, misi serta tujuan tersebut ke dalam tindakan nyata. Dengan komunitas Kajian remaja muslim karawang ini
                bergerak untuk meningkatkan ibadah agama didalam bidang ibadah, kajian-kajian islami.
            </p>
            <p>Visi:</p>
            <ul>
                <li>Menjadi organisasi dakwah Islam yang profesional dan berwawasan luas, serta mengoptimasi potensi insani dalam mewujudkan manusia yang melaksanakan ibadah kepada Allah Swt.</li>
            </ul>
            <p>Misi:</p>
            <ul>
                <li>Memberikan kontribusi nyata dalam pembangunan bangsa dan agama melalui dakwah, pengkajian, pembinaan dan pemupukan ajaran dalam yang dilakukan secara menyeluruh, berkesinambungan dan penuh kesungguhan, profesional sebagai komponen bangsa dalam wadah Negara Kesatuan Republik Indonesia (NKRI).</li>
            </ul>
            <nav>
                <ul>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
