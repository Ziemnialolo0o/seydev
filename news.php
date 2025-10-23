<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (empty($_SESSION['user'])) {
    // Nie jest zalogowany — przekieruj na stronę główną z formularzem logowania
    header('Location: glowna.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="SeyDev">
  <meta name="description" content="">
  <link rel="stylesheet" href="styl2.css">
  <title>SeyDev - Aktualności</title>
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="glowna.php">Strona główna</a></li>
                <li><a href="my.php">O nas</a></li>
                <li><a href="news.php">Aktualności</a></li>
            </ul>
        </nav>
            <div class="logowanie">
                <div class="user_footer">
                    <p id="logged_user">Zalogowany użytkownik: <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
                    <p><a href="logout.php">Wyloguj się</a></p>
                </div>
            </div>
    </header>
    <main>
        <div>
            <h1 id="aktualnosci">Aktualności</h1>
            <p>Wkrótce</p>

        </div>
    </main>
    <footer>
        <p>Copyright &copy; by SeyDev</p>
    </footer>
    <script src="skrypt.js"></script>
</body>
</html>
