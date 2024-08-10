<?php
class Encuesta extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    
    public function insertarRespuesta($id_ticket, $pregunta_id, $calificacion) {
        $stmt = $this->conexion->prepare("CALL insertar_respuesta(?, ?, ?)");
        $stmt->execute([$id_ticket, $pregunta_id, $calificacion]);
    }


    public function insertarTicket($id_usuario, $descripcion) {
        // Verificamos que la descripción no esté vacía
        if (empty($descripcion)) {
            return "La descripción no puede estar vacía.";
        }

        try {
            // Preparamos la consulta SQL para insertar el ticket
            $sql = "INSERT INTO ticket (id_usuario, descripcion) VALUES (?, ?)";
            $stmt = $this->getConexion()->prepare($sql);
            
            // Ejecutamos la consulta con los valores directamente
            if ($stmt->execute([$id_usuario, $descripcion])) {
                return "Ticket creado exitosamente.";
            } else {
                return "Error al crear el ticket.";
            }
        } catch (PDOException $e) {
            // En caso de un error, retornamos el mensaje
            return "Error: " . $e->getMessage();
        }

        //(falta)asociar encuesta con ticket ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

    }

}

// a= 1, b=.75, c=.50, d= .25  / 15 * 10 =calificacion
?>

