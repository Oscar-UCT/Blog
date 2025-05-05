<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span>Bienvenido/a, <?php echo $_SESSION["usuario"] ?></span>
    <nav>
        <a href="./frontend/registro.html">Registrar</a>
        <a href="./frontend/login.html">Ingresar</a>
    </nav>
</body>
</html>