<?php
session_start();
require_once("Clases/Ticket.php");
require_once("Clases/Usuario.php");
require_once("Clases/Soporte.php");

$ticked = new Ticket();
$usuario = new Usuario();
$soporte = new Soporte();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    echo $id;
}

$soporte->tomarTicket(1,$id);


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
        $tickedUsuario = $ticked->obtenerTicketPorId($id);
        ?>
        <p class="tabla-p">Usuario: <?php echo $usuario->obtenerUsuarioPorId($tickedUsuario->id_usuario)->usuario; ?></p>
        <p class="tabla-p">Descripcion: <?php echo $tickedUsuario->descripcion; ?></p>
        <form action="">
           <input type="text">
        </form>
    </main>


</body>

</html>