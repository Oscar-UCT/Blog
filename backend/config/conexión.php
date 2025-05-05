<?php
$conexión = new mysqli("localhost", "root", "", "blog");
if ($conexión->connect_error)
{
    die("Conexión fallida: " + $conexión->connect_error);
}
?>