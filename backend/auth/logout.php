<?php
session_start();
// Código de IA (https://chatgpt.com/)
// Limpia las cookies y la sesión
// Da la posibilidad al usuario de cerrar sesión

$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: ../../index.php");
exit;
?>
