<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/79795cbd8e.js" crossorigin="anonymous"></script>
    <!-- Fin de Enlaces Externos -->
    <link rel="stylesheet" href="CSS/crear_reporte.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Crear Reportes</title>
</head>

<body>
    <nav>
        <!-- <input type="checkbox" id="check-menu">
        <label for="check-menu"><i class="fa-solid fa-bars"></i></label> -->
        <div class="contendor-menu">
            <a href="index.php" class="nombre-pagina">VIAJERO DIGITAL</a>
            <a href="inicio.php" class="nav-enlace">Inicio</i></a>
            <div class="contendor-submenu">
                <a href="#" class="nav-enlace nav-enlace-seleccionado">Reportes <i class="fa-solid fa-caret-down"></i></a>
                <div class="submenu">
                    <a href="crear_reporte.php" class="nav-enlace-submenu">Crear</a>
                    <a href="#" class="nav-enlace-submenu">Historial</a>
                </div>
            </div>
            <div class="contendor-submenu">
                <a href="#" class="nav-enlace">Chats <i class="fa-solid fa-caret-down"></i></a>
                <div class="submenu">
                    <a href="#" class="nav-enlace-submenu">Crear</a>
                    <a href="#" class="nav-enlace-submenu">Modificar</a>
                    <a href="#" class="nav-enlace-submenu">Eliminar</a>
                    <a href="#" class="nav-enlace-submenu">Historial</a>
                </div>
            </div>
            <a href="encuesta.php" class="nav-enlace">Encuesta</a>
        </div>
        <div class="div-enlaces">
            <a href="#" class="nav-enlace nav-enlace-subrayado"><?php echo json_decode($_SESSION["usuario"]); ?></a>
            <button class="nav-boton">
                <a href="salir.php" class="nav-boton-a">Salir <i class="fa-solid fa-right-from-bracket"></i></a>
            </button>
        </div>
    </nav>

</body>

</html>