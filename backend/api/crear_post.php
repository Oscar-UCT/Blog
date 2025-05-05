<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $titulo = trim($_POST["usuario"] ?? "");
    $cuerpo = $_POST["contraseña"] ?? "";
    $correo = filter_var($_POST["correo"] ?? "", FILTER_VALIDATE_EMAIL);

    if (!$usuario || !$contraseña || !$correo) {
        die("Datos inválidos.");
    }

    $stmt = $conexión->prepare("SELECT usuario_id FROM usuarios WHERE nombre = ? OR correo = ? LIMIT 1");
    $stmt->bind_param("ss", $usuario, $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->fetch_assoc()) {
        die("Nombre de usuario o correos ya tomados.");
    }

    $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);

    $stmt = $conexión->prepare("INSERT INTO Usuarios (nombre, correo, contraseña) VALUES (?, ?, ?)");
    try
    {
        $stmt->bind_param("sss", $usuario, $correo, $contraseñaHash);
        $stmt->execute();
        header("Location: ../../index.php");
    } catch (Exception $e)
    {
        die("Registro fallido: ".$e->getMessage());
    }
}
else
{
    die("Método inválido");
}
?>