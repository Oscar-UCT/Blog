<?php
require "../config/conexión.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"] ?? "");
    $cuerpo = $_POST["cuerpo"] ?? "";
    $autor = $_POST["autor"] ?? "";

    if (!$titulo || !$cuerpo || !$autor) {
        die("Datos inválidos.");
    } // Verificación extra para mayor integridad

    // $stmt para prevenir inyecciones sql
    $stmt = $conexión->prepare("INSERT INTO posts (titulo, cuerpo, autor) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexión->error);
    }
    $stmt->bind_param("sss", $titulo, $cuerpo, $autor);

    // Si se ejecuta correctamente se redirecciona a la página principal para ver el post
    if ($stmt->execute()) {
        header("Location: ../../index.php");
    } else {
        echo "Error al guardar el post: " . $stmt->error;
    }

    // Liberación de recursos
    $stmt->close();
    $conexión->close();
} else {
    die("Método inválido");
}
