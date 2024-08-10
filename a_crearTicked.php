<?php 

require_once("Clases/Ticket.php");

session_start();

$descripcion=$_POST["descripcion"];

$ticked=new Ticket();
$ticked->crearTicket($_SESSION["usuario_id"],$descripcion);

header("location:historial_ticked.php");

?>