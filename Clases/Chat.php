<?php

class Chat extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function insertarMensajeChat($id_ticket, $mensaje) {
        $stmt = $this->conexion->prepare("CALL insertar_mensaje_chat(?, ?)");
        $stmt->execute([$id_ticket, $mensaje]);
    }
}

?>
