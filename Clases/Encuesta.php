<?php
require_once("Clases/Conexion.php");
class Encuesta extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verPreguntas(){
        $stmt=$this->conexion->prepare("SELECT * FROM wiew_preguntas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertarRespuesta($ticket_id,$pregunta_id,$calificacion){
        $sql = "INSERT INTO respuestas (id_ticket,pregunta_id,calificacion) VALUES (?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        try {
            $stmt->execute([$ticket_id,$pregunta_id,$calificacion]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function actualizarEstadoEncuesta($ticket_id){
        $sql = "Call actualizar_estado_encuesta(?)";
        $stmt = $this->conexion->prepare($sql);
        try {
            $stmt->execute([$ticket_id]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }


    

    public function insertarPregunta($texto)
    {
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
