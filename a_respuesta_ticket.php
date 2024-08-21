<?php
session_start();
require_once("Clases/Ticket.php");
require_once("Clases/Usuario.php");
require_once("Clases/Soporte.php");

$cTicket = new Ticket();
$cUsuario = new Usuario();
$cSoporte = new Soporte();

$respuesta = $_POST["respuesta"];
$ticket_id = $_GET["ticket_id"];

switch ($_SESSION["rol"]) {
  case "soporte":
    $cTicket->actualizarDescripcionTicket($ticket_id, "<br><Strong>R.Soporte: </Strong>" . $respuesta);
    $cTicket->actualizarEstadoTicket($ticket_id, "En progreso");
    $cTicket->actualizarIdSoporte($ticket_id,$_SESSION["soporte_id"]);
    header("location:historial_ticked.php");
    break;
  case "usuario":
    $cTicket->actualizarDescripcionTicket($ticket_id, "<br><Strong>R.Usuario: </Strong>" . $respuesta);
    header("location:historial_ticked.php");
    break;
}
