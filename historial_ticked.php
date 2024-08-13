<?php
session_start();
require_once("Clases/Ticket.php");
require_once("Clases/Usuario.php");

$ticked = new Ticket();
$usuario = new Usuario();

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
    <link rel="stylesheet" href="CSS/historial_reporte.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Historial Reportes</title>
</head>

<body>
    <?php
    switch ($_SESSION["rol"]) {
        case "usuario":
    ?>
            <nav>
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

            <main>
                <?php
                $tickeds = $ticked->obtenerTicketsPorUsuario($_SESSION["usuario_id"]);
                foreach ($tickeds as $usuarioTicked) {
                ?>
                    <p class="tabla-titulo">Nombre:</p>
                    <p class="tabla-titulo">Descripcion:</p>
                    <p class="tabla-titulo">Acciones:</p>
                    <p class="tabla-p"><?php echo json_decode($_SESSION['usuario']); ?></p>
                    <p class="tabla-p"><?php echo $usuarioTicked->descripcion; ?></p>
                    <button class="tabla-btn" disabled><a href="encuesta.php" class="tabla-enlace">Encuesta</a></button>
                <?php
                }
                ?>
            </main>
        <?php
            break;
        case "soporte":
        ?>

            <main>
                <?php
                $tickeds = $ticked->obtenerTicketsPorEstado("Nuevo");
                foreach ($tickeds as $usuarioTicked) {
                ?>
                    <p class="tabla-titulo">Nombre:</p>
                    <p class="tabla-titulo">Descripcion:</p>
                    <p class="tabla-titulo">Acciones:</p>
                    <p class="tabla-p"><?php echo ""; ?></p>
                    <p class="tabla-p"><?php echo $usuarioTicked->descripcion; ?></p>
                    <button class="tabla-btn" disabled><a href="encuesta.php" class="tabla-enlace">Encuesta</a></button>
                <?php
                }
                ?>
            </main>
    <?php
            break;
    }
    ?>


</body>

</html>