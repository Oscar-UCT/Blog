<?php
require "../config/conexión.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $titulo = trim($_POST["titulo"] ?? "");
    $cuerpo = $_POST["cuerpo"] ?? "";
    $autor = $_POST["autor"] ?? "";

    if (!$titulo || !$cuerpo || !$autor) {
        die("Datos inválidos.");
    }

    $stmt = $conexión->prepare("INSERT INTO posts (titulo, cuerpo, autor) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexión->error);
    }

    $stmt->bind_param("sss", $titulo, $cuerpo, $autor);

    if ($stmt->execute()) {
        echo "Post guardado correctamente.";
    } else {
        echo "Error al guardar el post: " . $stmt->error;
    }

    $stmt->close();
    $conexión->close();
}

else
{
    die("Método inválido");
}
?>