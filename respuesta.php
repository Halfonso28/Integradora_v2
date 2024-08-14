<?php 
  session_start();
  require_once("Clases/Ticket.php");
  require_once("Clases/Usuario.php");
  require_once("Clases/Soporte.php");
  
  $ticked = new Ticket();
  $usuario = new Usuario();
  $soporte = new Soporte();

  $respuesta=$_POST["respuesta"];

  $ticked->actualizarDescripcionTicket($ticked->obtenerTicketPorId($_SESSION["id_ticked"])->id,"<br><br>Respuesta: ".$respuesta);
  $ticked->ticketEnprogreso($_SESSION["id_ticked"]);
  header("location:historial_ticked.php")
?>