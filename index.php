<?php
require "./backend/config/conexión.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // La sesión se debe iniciar en cada módulo
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./frontend/assets/css/main.css">
    <script defer src="./frontend/assets/js/script.js"></script>
    <title>Twig</title>
</head>

<body>
    <header>
        <h1>Twig</h1>
        <a href="./frontend/nuevopost.php" class="btn-primary">Postear</a>
        <div class="header-derecha">
            <!-- Muestra el nombre si está ingresado, muestra botón para ingresar si no -->
            <?php if (isset($_SESSION["usuario"])): ?>
                <div id="header-usuario">
                    <img src="./frontend/assets/imgs/user-icon-white.png" alt="user image" style="width:20px; height:20px; vertical-align:middle; border-radius:50%;">
                    <?= htmlspecialchars($_SESSION["usuario"]) ?>
                    <a href="../blog/backend/auth/logout.php" id="logout-btn">Cerrar sesión</a>
                </div>
            <?php else: ?>
                <a href="./frontend/login.html" class="btn-primary">Ingresar</a>
            <?php endif; ?>
        </div>
    </header>
    <section id="posts">
        <div id="posts-contenido">
            <h2 class="subtitle">Posts</h2>
            <div id="posts-recientes">
                <?php
                $result = $conexión->query("SELECT * FROM Posts");
                if (!$result) {
                    die("Error en la consulta: " . $conexión->error);
                }
                while ($row = $result->fetch_assoc()):
                ?>
                    <div class="tarjeta-post">
                        <div class="tarjeta-header">
                            <img src="./frontend/assets/imgs/user-icon-white.png" alt="Profile picture" class="pfp">
                            <span class="tarjeta-post-autor"><?php echo htmlspecialchars($row["autor"]) ?></span>
                            <span class="tarjeta-post-fecha"><?php echo htmlspecialchars($row["fecha_creacion"]) ?></span>
                        </div>
                        <span class="tarjeta-post-titulo"><?php echo htmlspecialchars($row["titulo"]) ?></span>
                        <span class="tarjeta-post-cuerpo"><?php echo nl2br(htmlspecialchars($row["cuerpo"])) ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="sidebar">
            <h3 class="subtitle">Información</h3>
            <div class="sidebar-contenido">
                <span>> Proyecto demo</span>
                <br>
                <span>> Si deseas postear algo, debes registrate</span>
                <br>
                <span>> Todo lo que subas será público</span>
            </div>
        </div>
    </section>
</body>

</html>