<?php

class VistasChat {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerChatsPorTicket($ticket_id) {
        $stmt = $this->db->prepare("SELECT * FROM vista_chats_por_ticket WHERE id_ticket = ?");
        $stmt->execute([$ticket_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
