<?php

class VistasSoporte {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerSoportes() {
        $stmt = $this->db->prepare("SELECT * FROM vista_soportes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
