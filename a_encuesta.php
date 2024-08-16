<?php
session_start();
require_once("Clases/Encuesta.php");

$encuesta = new Encuesta();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id=$_SESSION["ticket_id"];
    $pregunta_1 = $_POST['pre-1'];
    $pregunta_2 = $_POST['pre-2'];
    $pregunta_3 = $_POST['pre-3'];
    $pregunta_4 = $_POST['pre-4'];
    $pregunta_5 = $_POST['pre-5'];
    $pregunta_6 = $_POST['pre-6'];
    $pregunta_7 = $_POST['pre-7'];
    $pregunta_8 = $_POST['pre-8'];
    $pregunta_9 = $_POST['pre-9'];
    $pregunta_10 = $_POST['pre-10'];
    $pregunta_11 = $_POST['pre-11'];
    $pregunta_12 = $_POST['pre-12'];
    $pregunta_13 = $_POST['pre-13'];
    $pregunta_14 = $_POST['pre-14'];
    $pregunta_15 = $_POST['pre-15'];

    $encuesta->insertarRespuesta($ticket_id,1,$pregunta_1);
    $encuesta->insertarRespuesta($ticket_id,2,$pregunta_2);
    $encuesta->insertarRespuesta($ticket_id,3,$pregunta_3);
    $encuesta->insertarRespuesta($ticket_id,4,$pregunta_4);
    $encuesta->insertarRespuesta($ticket_id,5,$pregunta_5);
    $encuesta->insertarRespuesta($ticket_id,6,$pregunta_6);
    $encuesta->insertarRespuesta($ticket_id,7,$pregunta_7);
    $encuesta->insertarRespuesta($ticket_id,8,$pregunta_8);
    $encuesta->insertarRespuesta($ticket_id,9,$pregunta_9);
    $encuesta->insertarRespuesta($ticket_id,10,$pregunta_10);
    $encuesta->insertarRespuesta($ticket_id,11,$pregunta_11);
    $encuesta->insertarRespuesta($ticket_id,12,$pregunta_12);
    $encuesta->insertarRespuesta($ticket_id,13,$pregunta_13);
    $encuesta->insertarRespuesta($ticket_id,14,$pregunta_14);
    $encuesta->insertarRespuesta($ticket_id,15,$pregunta_15);

    header("location:inicio.php");

}

?>