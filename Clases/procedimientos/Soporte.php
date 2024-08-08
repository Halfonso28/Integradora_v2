<?php

class Soporte {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insertarSoporte($id_usuario, $curp, $rfc, $numero_seguro_social) {
        $stmt = $this->db->prepare("CALL insertar_soporte(?, ?, ?, ?)");
        $stmt->execute([$id_usuario, $curp, $rfc, $numero_seguro_social]);
    }
}

?>
