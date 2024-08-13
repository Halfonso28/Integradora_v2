<?php
require_once("Clases/Conexion.php");
class Ticket extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function crearTicket($id_usuario, $descripcion) {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO ticket (id_usuario, descripcion) VALUES (?, ?)");
            $stmt->execute([$id_usuario, $descripcion]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //estados enum('Nuevo', 'En progreso', 'Finalizado')
    public function obtenerTicketsPorEstado($estado) {
        try {
            $stmt = $this->conexion->prepare("CALL tickets_estado(?)");
            $stmt->execute([$estado]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function tomarTicket($ticket_id, $soporte_id) {
        try {
            $stmt = $this->conexion->prepare("CALL tomar_ticket(?, ?)");
            $stmt->execute([$ticket_id, $soporte_id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function obtenerTicketPorId($id_ticket) {
        $stmt = $this->conexion->prepare("CALL obtener_ticket_por_id(?)");
        $stmt->execute([$id_ticket]);
        return $stmt->fetchObject();
    }
    
    public function obtenerTicketsPorUsuario($usuario_id) {
        $stmt = $this->conexion->prepare("CALL obtener_tickets_por_usuario(?)");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function actualizarDescripcionTicket($ticket_id, $nueva_descripcion) {
        try {
            $stmt = $this->conexion->prepare("CALL actualizar_descripcion_ticket(?, ?)");
            $stmt->execute([$ticket_id, $nueva_descripcion]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /*
    public function obtenerChatsPorTicket($ticket_id) {
        $stmt = $this->conexion->prepare("CALL obtener_chats_por_ticket(?)");
        $stmt->execute([$ticket_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    */

    

}


?>