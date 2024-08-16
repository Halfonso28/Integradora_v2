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
                <table class="table table-striped mb-5">
                    <thead>
                        <tr>
                            <th>Usuario:</th>
                            <th>Descripcion:</th>
                            <th>Estado:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tickeds = $ticked->obtenerTicketsPorUsuario($_SESSION["usuario_id"]);
                        foreach ($tickeds as $usuarioTicked) {
                        ?>
                            <tr>
                                <td class="tabla-p"><?php echo json_decode($_SESSION['usuario']); ?></td>
                                <td class="tabla-p td-descripcion"><?php echo $usuarioTicked->descripcion; ?></td>
                                <td class="tabla-p"><?php echo $usuarioTicked->estado; ?></td>
                                <td>
                                    <button class="btn btn-primary"><a href="encuesta.php?ticket_id=<?php echo $usuarioTicked->id ?>" class="tabla-enlace">Encuesta</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </main>

        <?php
            break;
        case "soporte":
        ?>

            <main>
                <!-- <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="estado" onchange="this.form.submit()">
                        <option value="">Seleccionar Estado</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </form> -->
                <table class="table table-striped mb-5">
                    <thead>
                        <tr>
                            <th>Usuario:</th>
                            <th>Descripcion:</th>
                            <th>Estado:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tickeds = $ticked->obtenerTicketsPorEstado("Nuevo");
                        foreach ($tickeds as $usuarioTicked) {
                        ?>
                            <tr>
                                <td class="tabla-p"><?php echo $usuario->obtenerUsuarioPorId($usuarioTicked->id_usuario)->usuario; ?></td>
                                <td class="tabla-p"><?php echo $usuarioTicked->descripcion; ?></td>
                                <td class="tabla-p"><?php echo $usuarioTicked->estado; ?></td>
                                <td class="td-botones">
                                    <button class="tabla-btn btn btn-primary"><a href="a_ticked.php?id=<?php echo $usuarioTicked->id; ?>" class="tabla-enlace">Aceptar</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th>Usuario:</th>
                            <th>Descripcion:</th>
                            <th>Estado:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tickeds = $ticked->obtenerTicketsPorEstado("En progreso");
                        if($tij)
                        foreach ($tickeds as $usuarioTicked) {
                        ?>
                            <tr>
                                <td class="tabla-p"><?php echo $usuario->obtenerUsuarioPorId($usuarioTicked->id_usuario)->usuario; ?></td>
                                <td class="tabla-p"><?php echo $usuarioTicked->descripcion; ?></td>
                                <td class="tabla-p"><?php echo $usuarioTicked->estado; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </main>
    <?php
            break;
    }
    ?>

</body>

</html>