<?php

class Encuesta {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insertarRespuesta($id_ticket, $pregunta_id, $calificacion) {
        $stmt = $this->db->prepare("CALL insertar_respuesta(?, ?, ?)");
        $stmt->execute([$id_ticket, $pregunta_id, $calificacion]);
    }
}
?>
