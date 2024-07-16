<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login KRMK</title>
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
            <h2>Login</h2>
    
            <form action="authenticate.php" method="post">
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <br><br>
                <button type="submit">Login</button>
                <br><br>
                <a href="register_jamaah.php">Belum Punya Akun? Buat Akun</a>
            </form>
        </main>
        <footer>
            <p>Chairul Iman - 23.230.0091 - Sistem Informasi</p>
        </footer>
    </div>
</body>
</html>
