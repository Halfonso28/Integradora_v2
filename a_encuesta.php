<?php
session_start();
require_once("Clases/Encuesta.php");

$encuesta = new Encuesta();

$encuesta->insertarRespuesta($_SESSION["usuario_id"]);

?>