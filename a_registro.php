<?php

require_once("Clases/Usuario.php");

$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoPaterno"];
$apellidoM = $_POST["apellidoMaterno"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$fechaN = $_POST["fechaNacimiento"];

$c_usuario = new Usuario();
$c_usuario->insertarUsuario($nombre, $apellidoP, $apellidoM, $correo,$usuario, $contraseña, $telefono, $fechaN, "usuario");

header("location:ingresar.php");
?>
