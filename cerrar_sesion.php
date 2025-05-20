<?php
session_start(); // Inicia la sesión actual

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se están usando cookies para la sesión, destruirlas también
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Limpiar y destruir la sesión
session_unset();
session_destroy();

// Enviar headers para evitar caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// Redirige al formulario de login
header("Location: ../login_tutor.php");
exit;
?>