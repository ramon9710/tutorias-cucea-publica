<?php
$conexion = new mysqli('localhost', 'root', '', 'tutorias_cucea');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
