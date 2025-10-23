<?php
require_once 'config.php';

// Usuń dane sesji
$_SESSION = [];

// Usuń ciasteczka sesyjne
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}

session_destroy();

// Przekierowanie do strony głównej po wylogowaniu
header('Location: glowna.php');
exit;
