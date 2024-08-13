<?php
require_once("Clases/Autenticador.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $autenticador = new Autenticador();
    if ($autenticador->login($usuario, $contraseña)) {
        // Redireccionar a la página principal o dashboard
        header("location:inicio.php");
        exit();
    } else {
        // Redireccionar a la página de login con un mensaje de error
        header("location:ingresar.php?error=1");
        exit();
    }
} else {
    if (!isset($_SESSION["estadoSesion"]) || $_SESSION["estadoSesion"] === false) {
        header("location:ingresar.php");
        exit();
    }
}
?>