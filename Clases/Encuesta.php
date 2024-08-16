<?php
require_once("Clases/Conexion.php");
class Encuesta extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    
    public function insertarRespuesta($id_ticket, $pregunta_id, $calificacion) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario_id = $_SESSION['usuario_id']; 
        
        $pregunta_1 = $_POST['pre-1'];
        $pregunta_2 = $_POST['pre-2'];
        $pregunta_3 = $_POST['pre-3'];
        $pregunta_4 = $_POST['pre-4'];
        $pregunta_5 = $_POST['pre-5'];
        $pregunta_6 = $_POST['pre-6'];
        $pregunta_7 = $_POST['pre-7'];
        $pregunta_8 = $_POST['pre-8'];
        $pregunta_9 = $_POST['pre-9'];
        $pregunta_10 = $_POST['pre-10'];
        $pregunta_11 = $_POST['pre-11'];
        $pregunta_12 = $_POST['pre-12'];
        $pregunta_13 = $_POST['pre-13'];
        $pregunta_14 = $_POST['pre-14'];
        $pregunta_15 = $_POST['pre-15'];
        
        $sql = "INSERT INTO encuesta_respuestas (usuario_id, pregunta_1, pregunta_2, pregunta_3, pregunta_4, pregunta_5, pregunta_6, pregunta_7, pregunta_8, pregunta_9, pregunta_10, pregunta_11, pregunta_12, pregunta_13, pregunta_14, pregunta_15) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($this->conexion->query($sql) === TRUE) {
            echo "Respuestas guardadas exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->errorInfo();
        }
    

    }

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

    public function insertarPregunta($texto) {
        try {
            $sql = "INSERT INTO pregunta (texto) VALUES (?)";
            $stmt = $this->getConexion()->prepare($sql);
    
            if ($stmt->execute([$texto])) {
                return "Pregunta creada exitosamente.";
            } else {
                return "Error al crear la pregunta.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
}

// a= 1, b=.75, c=.50, d= .25  / 15 * 10 =calificacion
?>

