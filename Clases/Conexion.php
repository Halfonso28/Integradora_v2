<?php
class Conexion {
    private $host = "localhost";
    private $usuario = "super";
    private $contraseña = "1234";
    private $database = "reportes";
    protected $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->database", $this->usuario, $this->contraseña);
        } catch (PDOException $e) {
            print "!Error¡: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}
?>
