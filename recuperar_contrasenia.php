<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
  <header class="bg-black text-white text-center py-2">
    <h1>Recuperar Contraseña</h1>
  </header>

  <main class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'sent'): ?>
          <div class="alert alert-success">Se han enviado las instrucciones a tu correo si está registrado.</div>
        <?php endif; ?>

        <form action="procesar_recuperar_contrasenia.php" method="POST">
          <div class="mb-3">
            <label for="codigo_udg" class="form-label">Código UDG o Correo:</label>
            <input type="text" class="form-control" id="codigo_udg" name="codigo_udg" required autofocus>
          </div>

          <button type="submit" class="btn btn-primary w-100">Enviar instrucciones</button>
        </form>

        <div class="mt-3 text-center">
          <a href="login_tutor.php"><i class="fa-solid fa-arrow-left"></i> Volver al login</a>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-3">
    <p>Centro Universitario de Ciencias Económico Administrativas</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
