<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $codigo_udg = trim($_POST['codigo_udg']);

  if (empty($codigo_udg)) {
    header('Location: recuperar_contrasenia.php');
    exit;
  }

  // Buscar usuario (por código_udg o email)
  $stmt = $conexion->prepare("SELECT codigo_udg, email FROM tutores WHERE codigo_udg = ? OR email = ?");
  if (!$stmt) {
    header('Location: recuperar_contrasenia.php?status=error');
    exit;
  }
  $stmt->bind_param("ss", $codigo_udg, $codigo_udg);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    // En sistema real: generar token seguro y enviar correo con enlace único
    // Por ahora solo redirige con status enviado
    header('Location: recuperar_contrasenia.php?status=sent');
    exit;
  } else {
    // Para seguridad, no decir si existe o no, siempre redirigir
    header('Location: recuperar_contrasenia.php?status=sent');
    exit;
  }
}
?>
