<?php 
    require_once("Clases/Ticket.php");
    $ticket=new Ticket();
    $ticket_id=$_GET["ticket_id"];
    $fechaActual = date("Y-m-d");
    $ticket->actualizarEstadoTicket($ticket_id,"Finalizado");
    $ticket->actualizarFechaCierre($ticket_id,$fechaActual);
    header("location:historial_ticked.php");
?>