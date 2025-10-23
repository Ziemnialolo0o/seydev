<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Weryfikacja — tu akceptujemy *dowolny login i hasło*.
if ($username === '' || $password === '') {
    header('Location: login.php?error=' . urlencode('Wypełnij oba pola'));
    exit;
}

// Przechowywanie informacji w sesji (nawet bez weryfikacji bazy danych).
session_regenerate_id(true);
$_SESSION['user'] = [
    'username' => $username,
    'logged_at' => time()
];

// Po zalogowaniu przekierowanie na stronę główną
header('Location: glowna.php');
exit;
