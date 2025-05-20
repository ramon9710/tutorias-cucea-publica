<?php
include 'conexion.php';
if ($conexion) {
    echo "✅ Conexión exitosa.";
} else {
    echo "❌ Error en la conexión.";
}
?>