<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: ./login.html"); // Asegura que el usuario no pueda postear sin una cuenta
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Twig • Nuevo post</title>
</head>

<body>
    <header>
        <h1 onclick="window.location.href = '../index.php'">Twig</h1>
        <span>Publica tu post</span>
    </header>
    <div class="formulario">
        <h2>Post</h2>
        <form action="../backend/api/crear_post.php" method="POST">
            <input type="text" name="titulo" placeholder="Titulo" maxlength="32" required>
            <br>
            <textarea name="cuerpo" id="" placeholder="Texto" style="resize: none;" maxlength="600" rows="5" cols="66" required></textarea>
            <br>
            <input type="hidden" name="autor" value="<?php echo $_SESSION["usuario"] ?>">
            <button class="btn-primary">Subir</button>
        </form>
    </div>
</body>

</html>