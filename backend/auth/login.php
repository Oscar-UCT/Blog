<?php
session_start();
require "../config/conexión.php";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $correo = trim($_POST["correo"]) ?? "";
    $contraseña = $_POST["contraseña"] ?? "";

    if (!$correo || !$contraseña) {
        die("Por favor ingrese datos válidos.");
    }

    // Buscar el usuario por correo
    $stmt = $conexión->prepare("SELECT nombre, contraseña FROM Usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {
        // Verificar la contraseña
        if (password_verify($contraseña, $usuario['contraseña'])) {
            // Guardar datos en sesión
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['flash'] = "Inicio de sesión exitoso.";
            header("Location: ../../index.php");
        } else {    
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Correo no registrado.";
    }
}
?>