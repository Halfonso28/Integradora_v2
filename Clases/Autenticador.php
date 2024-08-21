<?php
require_once("Clases/Conexion.php");
class Autenticador extends Conexion{
    public function __construct() {
        parent::__construct();
    }

    public function login($usuario, $contraseña) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario = ? AND contraseña = ?");
        try{
            $stmt->execute([$usuario, hash('sha256',$contraseña)]);
            $usuario=$stmt->fetchObject();
            if($usuario) {
                session_start();
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario'] = json_encode($usuario->usuario);
                $_SESSION['rol'] = $usuario->rol;
                $_SESSION['estadoSesion']=true;
                if($_SESSION["rol"]=="soporte"){
                    $stmt = $this->conexion->prepare("SELECT * FROM soporte WHERE id_usuario = ?");
                    $stmt->execute([$_SESSION["usuario_id"]]);
                    $usuario=$stmt->fetchObject();
                    $stmt = $this->conexion->prepare("CALL obtener_soporte_por_usuario(?)");
                    $stmt->execute([$_SESSION['usuario_id']]);
                    $_SESSION["soporte_id"]= $stmt->fetchObject()->id;
                }
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
