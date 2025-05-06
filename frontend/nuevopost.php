<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION["usuario"]))
    {
        header("Location: ./login.html");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Nuevo post</title>
</head>
<body>
    <form action="../backend/api/crear_post.php" method="POST">
        <input type="text" name="titulo" placeholder="Titulo de tu post" maxlength="32">
        <br>
        <textarea name="cuerpo" id="" placeholder="Texto" style="resize: none;"></textarea>
        <br>
        <input type="hidden" name="autor" value="<?php echo $_SESSION["usuario"] ?>">
        <button class="btn-primary">Subir</button>
    </form>
</body>
</html>