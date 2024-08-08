<?php

class Ticket {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function actualizarEstadoTicket($ticket_id, $nuevo_estado) {
        $stmt = $this->db->prepare("CALL actualizar_estado_ticket(?, ?)");
        $stmt->execute([$ticket_id, $nuevo_estado]);
    }

    public function obtenerChatsPorTicket($ticket_id) {
        $stmt = $this->db->prepare("CALL obtener_chats_por_ticket(?)");
        $stmt->execute([$ticket_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTicketsPorEstado($estado_ticket) {
        $stmt = $this->db->prepare("CALL obtener_tickets_por_estado(?)");
        $stmt->execute([$estado_ticket]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTicketsPorUsuario($usuario_id) {
        $stmt = $this->db->prepare("CALL obtener_tickets_por_usuario(?)");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
