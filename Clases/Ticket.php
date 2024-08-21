<?php
require_once("Clases/Conexion.php");
class Ticket extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function crearTicket($id_usuario, $descripcion)
    {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO ticket (id_usuario, descripcion) VALUES (?, ?)");
            $stmt->execute([$id_usuario, $descripcion]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    //estados enum('Nuevo', 'En progreso', 'Finalizado')
    public function obtenerTicketsPorEstado($estado)
    {
        try {
            $stmt = $this->conexion->prepare("CALL obtener_tickets_por_estado(?)");
            $stmt->execute([$estado]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function verificarEstadoTicket($estado, $id_usuario)
    {
        try {
            // Preparar la llamada al procedimiento almacenado
            $stmt = $this->conexion->prepare("CALL verificar_ticket_estado(?, ?, @resultado)");

            // Ejecutar el procedimiento almacenado con los parámetros
            $stmt->execute([$estado, $id_usuario]);

            // Obtener el valor de salida
            $result = $this->conexion->query("SELECT @resultado")->fetch(PDO::FETCH_ASSOC);

            // Retornar el resultado como un valor booleano
            return (bool) $result['@resultado'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function verificarEstadoEncuesta($id_usuario)
    {
        try {
            // Preparar la llamada al procedimiento almacenado
            $stmt = $this->conexion->prepare("CALL verificar_estado_encuesta(?, @resultado)");

            // Ejecutar el procedimiento almacenado con el parámetro del id_usuario
            $stmt->execute([$id_usuario]);

            // Obtener el valor del resultado
            $result = $this->conexion->query("SELECT @resultado")->fetch(PDO::FETCH_ASSOC);

            // Retornar el resultado como un valor booleano
            return (bool) $result['@resultado'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function verificarExistenciaPorEstado($estado)
    {
        try {
            // Preparar la llamada al procedimiento almacenado
            $stmt = $this->conexion->prepare("CALL verificar_existencia_por_estado(?, @resultado)");

            // Ejecutar el procedimiento almacenado con el parámetro del estado
            $stmt->execute([$estado]);

            // Obtener el valor de salida
            $result = $this->conexion->query("SELECT @resultado")->fetch(PDO::FETCH_ASSOC);

            // Retornar el resultado como un valor booleano
            return (bool) $result['@resultado'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function obtenerTicketsPorFecha($fechaInicio, $fechaFin)
    {
        try {
            $stmt = $this->conexion->prepare("CALL obtener_tickets_por_fecha(?,?)");
            $stmt->execute([$fechaInicio, $fechaFin]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }


    public function obtenerTicketPorId($id_ticket)
    {
        $stmt = $this->conexion->prepare("CALL obtener_ticket_por_id(?)");
        $stmt->execute([$id_ticket]);
        return $stmt->fetchObject();
    }

    public function obtenerTicketsPorUsuario($usuario_id)
    {
        try {
            $stmt = $this->conexion->prepare("CALL obtener_tickets_por_usuario(?)");
            $stmt->execute([$usuario_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function actualizarDescripcionTicket($ticketId, $nuevaDescripcion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL actualizar_descripcion_ticket(?, ?)");
            $stmt->execute([$ticketId, $nuevaDescripcion]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarIdSoporte($id_ticket, $id_soporte)
    {
        try {
            // Preparar la llamada al procedimiento almacenado
            $stmt = $this->conexion->prepare("CALL actualizar_id_soporte(?, ?)");

            // Ejecutar el procedimiento almacenado con los parámetros proporcionados
            $stmt->execute([$id_ticket, $id_soporte]);

            // Si la actualización fue exitosa, retornamos true
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function actualizarEstadoTicket($ticketId, $nuevoEstado)
    {
        try {
            $stmt = $this->conexion->prepare("CALL actualizar_estado_ticket(?,?)");
            $stmt->execute([$ticketId, $nuevoEstado]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarFechaCierre($ticketId, $fechaCierre)
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE ticket SET fecha_cierre = ? WHERE id = ?");
            $stmt->execute([$fechaCierre, $ticketId]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
