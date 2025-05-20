<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_udg = $_POST['codigo_udg'];
    $password_plain = $_POST['password'];
    $password = password_hash($password_plain, PASSWORD_DEFAULT);

    // Validar campos
    if (empty($codigo_udg) || empty($password_plain)) {
        echo "<script>alert('Por favor, llena todos los campos obligatorios.'); window.history.back();</script>";
        exit();
    }

    // Validar existencia en maestros
    $consulta_validacion = $conexion->prepare("SELECT * FROM maestros WHERE codigo_udg_maestro = ?");
    $consulta_validacion->bind_param("s", $codigo_udg);
    $consulta_validacion->execute();
    $resultado = $consulta_validacion->get_result();

    if ($resultado->num_rows === 0) {
        echo "<script>alert('El código UDG no está autorizado. Consulta con el coordinador.'); window.history.back();</script>";
        exit();
    }

    $maestro = $resultado->fetch_assoc();

    // Mostrar confirmación al usuario con los datos recuperados
    echo "<script>
        if (confirm('El tutor será registrado con los siguientes datos:\\n\\nNombre: {$maestro['nombre']} {$maestro['apellido_1']} {$maestro['apellido_2']}\\nCorreo: {$maestro['correo']}\\n\\n¿Deseas continuar?')) {
            window.location.href = 'registro_procesar.php?confirmado=1&codigo_udg={$codigo_udg}&password=" . urlencode($password) . "';
        } else {
            window.history.back();
        }
    </script>";

    $consulta_validacion->close();
    exit();
}

// Si viene confirmación desde GET
if (isset($_GET['confirmado']) && $_GET['confirmado'] == 1) {
    $codigo_udg = $_GET['codigo_udg'];
    $password = $_GET['password'];

    // Verificar que no exista ya en tutores
    $consulta_existente = $conexion->prepare("SELECT * FROM tutores WHERE codigo_udg = ?");
    $consulta_existente->bind_param("s", $codigo_udg);
    $consulta_existente->execute();
    $resultado_existente = $consulta_existente->get_result();

    if ($resultado_existente->num_rows > 0) {
        echo "<script>alert('Este código UDG ya está registrado como tutor.'); window.location.href = 'registro_tutor.php';</script>";
        exit();
    }

    // Obtener los datos del maestro de nuevo
    $consulta_maestro = $conexion->prepare("SELECT * FROM maestros WHERE codigo_udg_maestro = ?");
    $consulta_maestro->bind_param("s", $codigo_udg);
    $consulta_maestro->execute();
    $resultado_maestro = $consulta_maestro->get_result();

    if ($resultado_maestro->num_rows === 0) {
        echo "<script>alert('El código UDG no está autorizado. Consulta con el coordinador.'); window.location.href = 'registro_tutor.php';</script>";
        exit();
    }

    $maestro = $resultado_maestro->fetch_assoc();

    // Insertar en tutores
    $sql = $conexion->prepare("INSERT INTO tutores (
        codigo_udg, nombre, apellido_1, apellido_2, email, password
    ) VALUES (?, ?, ?, ?, ?, ?)");

    $sql->bind_param(
        "ssssss",
        $codigo_udg, $maestro['nombre'], $maestro['apellido_1'], $maestro['apellido_2'], $maestro['correo'], $password
    );

    if ($sql->execute()) {
        echo "<script>alert('Registro exitoso. ¡Bienvenido al sistema de tutorías!'); window.location.href = 'login_tutor.php';</script>";
    } else {
        echo "<script>alert('Error al registrar: " . $sql->error . "'); window.location.href = 'registro_tutor.php';</script>";
    }

    $consulta_existente->close();
    $consulta_maestro->close();
    $sql->close();
    $conexion->close();
    exit();
}

$conexion->close();
?>
