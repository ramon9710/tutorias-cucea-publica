<?php
session_start();
if (!isset($_SESSION['usuario_udg']) || $_SESSION['password']) {
    header("Location: ../login_tutor.php");
    exit;
}
?>