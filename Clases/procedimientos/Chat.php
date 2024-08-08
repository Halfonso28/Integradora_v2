<?php

class Chat {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function insertarMensajeChat($id_ticket, $mensaje) {
        $stmt = $this->db->prepare("CALL insertar_mensaje_chat(?, ?)");
        $stmt->execute([$id_ticket, $mensaje]);
    }
}

?>
