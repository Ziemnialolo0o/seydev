<?php
require_once 'config.php';

$error_message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz dane z formularza
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username !== '' && $password !== '') {
        // Zabezpieczenie sesji
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'username' => $username,
            'logged_at' => time()
        ];
        // Przekierowanie po zalogowaniu, aby odświeżyć stronę
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;  // Zakończ skrypt po przekierowaniu
    } else {
        $error_message = 'Wypełnij oba pola!';
    }
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
  <title>SeyDev - O nas</title>
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
                    <?php
                    // Sprawdzamy, czy użytkownik jest zalogowany
                    if (!empty($_SESSION['user'])) {
                    ?>
                        <p id="logged_user">Zalogowany użytkownik: <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
                        <p><a href="logout.php">Wyloguj się</a></p>
                    <?php } else { ?>
                            <h2>Zaloguj się</h2>
                            <form method="POST">
                                <label>
                                    Nazwa użytkownika:
                                    <input type="text" name="username" required>
                                </label><br>
                                <label>
                                    Hasło:
                                    <input type="password" name="password" required>
                                </label><br>
                                <button type="submit">Zaloguj</button>
                            </form>
                        <?php if (!empty($error_message)): ?>
                            <p style="color:red"><?= htmlspecialchars($error_message) ?></p>
                        <?php endif; ?>
                    <?php } ?>
                </div> 
            </div>
    </header>
    <main>
        <div>
            <h1>Skład SeyDev</h1>
            <p>Stanisław Śpioszek (lider)</p>
            <p>Darek Daro (programista)</p>
            <p>Maciej Ziemnialolo0o (grafik)</p>
            <p>Oskar Slava (programista)</p>
            <p>Jakub Opebol (programista/grafik)</p>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; by SeyDev</p>
    </footer>

    <script src="skrypt.js"></script>
</body>
</html>
