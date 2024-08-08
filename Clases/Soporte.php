<?php

class Soporte extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function insertarSoporte($id_usuario, $curp, $rfc, $numero_seguro_social) {
        $stmt = $this->conexion->prepare("CALL insertar_soporte(?, ?, ?, ?)");
        $stmt->execute([$id_usuario, $curp, $rfc, $numero_seguro_social]);
    }
}

?>
