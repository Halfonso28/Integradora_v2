<?php
session_start();
require_once("Clases/Ticket.php");
require_once("Clases/Usuario.php");
require_once("Clases/Soporte.php");

$cTicket = new Ticket();
$cUsuario = new Usuario();
$cSoporte = new Soporte();

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
    <link rel="stylesheet" href="CSS/respuesta_ticket.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Reponder Reporte</title>
</head>

<body>
    <a href="inicio.php"><i class="fa-solid fa-arrow-left"></i></a>
    <main>
        <?php
        $ticketUsuario = $cTicket->obtenerTicketPorId($ticket_id);
        ?>
        <div class="div-p">
            <p class="p-ticket"><strong>Soporte:</strong>
                <?php
                try {
                    $resultado = $cUsuario->obtenerUsuarioPorSoporteId($ticketUsuario->id_soporte);
                    if (!$resultado || !isset($resultado->usuario)) {
                        throw new Exception("No se pudo obtener el usuario con ID de soporte: " . $ticketUsuario->id_soporte);
                    }
                    $usuario = $resultado->usuario;
                    echo $usuario;
                } catch (Exception $e) {
                    echo "S/A";
                }
                ?>

            </p>
            <p class="p-ticket"><strong>Usuario:</strong> <?php echo $cUsuario->obtenerUsuarioPorId($ticketUsuario->id_usuario)->usuario; ?></p>
        </div>
        <form action="a_respuesta_ticket.php?ticket_id=<?php echo $ticket_id ?>" method="post">
            <p class="p-ticket"><?php echo $ticketUsuario->descripcion; ?></p>
            <textarea name="respuesta" required></textarea>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </main>


</body>

</html>