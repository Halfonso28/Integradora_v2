<?php

class VistasTicket {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerTicketsPorUsuario($usuario_id) {
        $stmt = $this->db->prepare("SELECT * FROM vista_tickets_por_usuario WHERE id_usuario = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerTicketsPorEstado($estado_ticket) {
        $stmt = $this->db->prepare("SELECT * FROM vista_tickets_por_estado WHERE estado = ?");
        $stmt->execute([$estado_ticket]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRespuestasPorTicket($ticket_id) {
        $stmt = $this->db->prepare("SELECT * FROM vista_respuestas_por_ticket WHERE id_ticket = ?");
        $stmt->execute([$ticket_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
