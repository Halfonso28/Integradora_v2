<?php

class Encuesta extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function insertarRespuesta($id_ticket, $pregunta_id, $calificacion) {
        $stmt = $this->conexion->prepare("CALL insertar_respuesta(?, ?, ?)");
        $stmt->execute([$id_ticket, $pregunta_id, $calificacion]);
    }
}
?>
