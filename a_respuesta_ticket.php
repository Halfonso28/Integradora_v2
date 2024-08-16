<?php 
  session_start();
  require_once("Clases/Ticket.php");
  require_once("Clases/Usuario.php");
  require_once("Clases/Soporte.php");
  
  $ticket = new Ticket();
  $usuario = new Usuario();
  $soporte = new Soporte();

  $respuesta=$_POST["respuesta"];
  $ticket_id=$_GET["ticket_id"];
  $ticket->actualizarDescripcionTicket($ticket_id,"<br>Respuesta: ".$respuesta);
  $ticket->actualizarEstadoTicket($ticket_id,"En progreso");
  header("location:historial_ticked.php")
?>