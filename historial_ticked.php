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
                    <a href="#" class="nav-enlace">Encuesta</a>
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
                                    <?php
                                    if ($usuarioTicked->estado == "Finalizado") {
                                    ?>
                                        <button class="btn btn-primary"><a href="encuesta.php?ticket_id=<?php echo $usuarioTicked->id ?>" class="tabla-enlace">Encuesta</a></button>
                                    <?php
                                    }
                                    ?>
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
            <nav>
                <div class="contendor-menu">
                    <a href="index.php" class="nombre-pagina">VIAJERO DIGITAL</a>
                    <a href="inicio.php" class="nav-enlace">Inicio</i></a>
                    <div class="contendor-submenu">
                        <p class="nav-enlace nav-enlace-seleccionado">Reportes <i class="fa-solid fa-caret-down"></i></p>
                        <div class="submenu">
                            <a href="historial_ticked.php" class="nav-enlace-submenu">Historial</a>
                        </div>
                    </div>
                    <a href="grafica.php" class="nav-enlace">Graficas</a>
                </div>
                <div class="div-enlaces">
                    <a href="#" class="nav-enlace nav-enlace-subrayado"><?php echo json_decode($_SESSION["usuario"]); ?></a>
                    <button class="nav-boton">
                        <a href="salir.php" class="nav-boton-a">Salir <i class="fa-solid fa-right-from-bracket"></i></a>
                    </button>
                </div>
            </nav>
            <main>
                <!-- Formulario para seleccionar el estado -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="estado" onchange="this.form.submit()">
                        <option value="Nuevo" <?php if (isset($_POST['estado']) && $_POST['estado'] == 'Nuevo') echo 'selected'; ?>>Nuevo</option>
                        <option value="En progreso" <?php if (isset($_POST['estado']) && $_POST['estado'] == 'En progreso') echo 'selected'; ?>>En progreso</option>
                        <option value="Finalizado" <?php if (isset($_POST['estado']) && $_POST['estado'] == 'Finalizado') echo 'selected'; ?>>Finalizado</option>
                    </select>
                    <input type="date" name="fecha_inicio" value="<?php echo isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : ''; ?>" placeholder="Fecha inicio">
                    <input type="date" name="fecha_fin" value="<?php echo isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : ''; ?>" placeholder="Fecha fin">
                    <button type="submit">Filtrar</button>
                </form>


                <?php
                // Obtener el estado seleccionado o por defecto "Nuevo"
                $estadoSeleccionado = isset($_POST['estado']) && $_POST['estado'] !== '' ? $_POST['estado'] : 'Nuevo';
                $fechaInicio = isset($_POST['fecha_inicio']) && !empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
                $fechaFin = isset($_POST['fecha_fin']) && !empty($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

                // Lógica para obtener los tickets filtrados por estado y rango de fechas
                if ($fechaInicio && $fechaFin) {
                    $tickeds = $ticked->obtenerTicketsPorFecha($fechaInicio, $fechaFin);
                } elseif ($fechaInicio) {
                    $tickeds = $ticked->obtenerTicketsPorFecha($fechaInicio, $fechaInicio);
                } else {
                    $tickeds = $ticked->obtenerTicketsPorEstado($estadoSeleccionado);
                }

                // Si hay tickets, muestra la tabla
                if (!empty($tickeds)) {
                ?>
                    <table class="table table-striped mb-5">
                        <thead>
                            <tr>
                                <th>Usuario:</th>
                                <th>Descripcion:</th>
                                <th>Estado:</th>
                                <th>Fecha Creación:</th>
                                <th>Fecha Fin:</th>
                                <th>Acciones:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tickeds as $usuarioTicket): ?>
                                <tr>
                                    <td class="tabla-p">
                                        <?php
                                        $usuarioObjeto = $usuario->obtenerUsuarioPorId($usuarioTicket->id_usuario);
                                        echo $usuarioObjeto->usuario;
                                        ?>
                                    </td>
                                    <td class="tabla-p"><?php echo $usuarioTicket->descripcion; ?></td>
                                    <td class="tabla-p"><?php echo $usuarioTicket->estado; ?></td>
                                    <td class="tabla-p"><?php echo date('Y-m-d', strtotime($usuarioTicket->fecha_creacion)); ?></td>
                                    <td class="tabla-p"><?php
                                                        if (date('Y-m-d', strtotime($usuarioTicket->fecha_cierre)) != "1970-01-01") {
                                                            echo date('Y-m-d', strtotime($usuarioTicket->fecha_cierre));
                                                        } else {
                                                            echo "Sin Fecha";
                                                        }
                                                        ?>
                                    </td>
                                    <td class="td-botones">
                                        <?php
                                        if ($usuarioTicket->estado != "Finalizado") {
                                        ?>
                                            <button class="tabla-btn btn btn-primary">
                                                <a href="respuesta_ticket.php?ticket_id=<?php echo $usuarioTicket->id; ?>" class="tabla-enlace">Responder</a>
                                            </button>
                                            <button class="tabla-btn btn btn-danger">
                                                <a href="a_finalizar_ticket.php?ticket_id=<?php echo $usuarioTicket->id; ?>" class="tabla-enlace">Finalizar</a>
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    // Si no hay tickets para el estado seleccionado, muestra un mensaje
                    echo "<p>No hay tickets en el estado seleccionado: $estadoSeleccionado.</p>";
                }
                ?>
            </main>

    <?php
            break;
    }
    ?>

</body>

</html>