<?php
require_once 'config.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz dane z formularza
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username !== '' && $password !== '') {
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'username' => $username,
            'logged_at' => time()
        ];
        // Po zalogowaniu nie przekierowujemy, tylko pokazujemy zawartość
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
  <title>SeyDev - Strona Główna</title>
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
            <?php if (!empty($error_message)): ?>
                <p style="color:red"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            
            <?php if (empty($_SESSION['user'])): ?>
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
            <?php else: ?>
                <div class="user_footer">
                    <p id="logged_user">Zalogowany użytkownik: <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
                    <p><a href="logout.php">Wyloguj się</a></p>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main>

        <div>
            <img src="./logogra.png" alt="Tu będzie logo gry SeyClass">
            <p id="haslo">haslo gry</p>
        </div>
    </main>

    <footer>
        <p>Copyright &copy; by SeyDev</p>
    </footer>

    <script src="skrypt.js"></script>
</body>
</html>
