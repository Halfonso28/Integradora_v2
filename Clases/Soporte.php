<?php

class Soporte extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function insertarSoporte($id_usuario, $curp, $rfc, $numero_seguro_social) {
        $stmt = $this->conexion->prepare("CALL insertar_soporte(?, ?, ?, ?)");
        $stmt->execute([$id_usuario, $curp, $rfc, $numero_seguro_social]);
    }

    public function tomarTicket($idSoporte, $idTicket) {
        try {
            // Prepara la consulta SQL directamente con los valores
            $sql = "CALL tomar_ticket($idSoporte, $idTicket)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            echo "Ticket asignado correctamente.";
        } catch (PDOException $e) {
            echo "Error al asignar el ticket: " . $e->getMessage();
        }
    }
}

?>
