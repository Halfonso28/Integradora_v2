<?php
require_once("Clases/Conexion.php");

class Usuario extends Conexion{
    public function __construct() {
        parent::__construct();
    }
    public function cambiarContraseñaUsuario($usuario_id, $nueva_contraseña) {
        $stmt = $this->conexion->prepare("CALL cambiar_contraseña_usuario(?, ?)");
        $stmt->execute([$usuario_id, $nueva_contraseña]);
    }

    public function insertarUsuario($nombre, $apellido_paterno, $apellido_materno, $correo, $usuario, $contraseña, $telefono, $fecha_nacimiento, $rol) {
        $stmt = $this->conexion->prepare("CALL registrar_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $correo, $usuario, $contraseña, $telefono, $fecha_nacimiento, $rol]);
    }

    public function obtenerUsuariosPorRol($rol_usuario) {
        $stmt = $this->conexion->prepare("CALL obtener_usuarios_por_rol(?)");
        $stmt->execute([$rol_usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //cambiar estado de usuario ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
}

?>
