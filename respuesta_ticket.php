<?php
session_start();
require_once("Clases/Ticket.php");
require_once("Clases/Usuario.php");
require_once("Clases/Soporte.php");

$ticket = new Ticket();
$usuario = new Usuario();
$soporte = new Soporte();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ticket_id = $_GET["ticket_id"];
}



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
    <main>
        <?php
        $ticketUsuario = $ticket->obtenerTicketPorId($ticket_id);
        ?>
        <p class="tabla-p">Usuario: <?php echo $usuario->obtenerUsuarioPorId($ticketUsuario->id_usuario)->usuario; ?></p>
        <p class="tabla-p">Descripcion: <?php echo $ticketUsuario->descripcion; ?></p>
        <form action="a_respuesta_ticket.php?ticket_id=<?php echo $ticket_id ?>" method="post">
           <input type="text" name="respuesta">
           <button class="btn btn-primary" type="submit">Enviar</button>
           <button class="btn btn-danger" type="submit">Finalizar</button>
        </form>
    </main>


</body>

</html>