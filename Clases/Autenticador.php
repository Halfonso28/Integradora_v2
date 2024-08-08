<?php
require_once("Clases/Conexion.php");
class Autenticador extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function login($usuario, $contraseña) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario = ? AND contraseña = ?");
        try{
            $stmt->execute([$usuario, $contraseña]);
            $usuario=$stmt->fetchObject();
            if($usuario) {
                session_start();
                $_SESSION['id'] = $usuario->id;
                $_SESSION['usuario'] = json_encode($usuario->usuario);
                $_SESSION['rol'] = $usuario->rol;
                $_SESSION['estadoSesion']=true;
                return true;
            } else {
                session_start();
                $_SESSION['estadoSesion']=false;
                return false;
            }
        }catch (PDOException $e) {
            print "!Error¡: " . $e->getMessage() . "<br/>";
            return false;
        }
        
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}
?>