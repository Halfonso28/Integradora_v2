<?php

class UserManager {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function cambiarContraseñaUsuario($usuario_id, $nueva_contraseña) {
        $stmt = $this->db->prepare("CALL cambiar_contraseña_usuario(?, ?)");
        $stmt->execute([$usuario_id, $nueva_contraseña]);
    }

    public function insertarUsuario($nombre, $apellido_paterno, $apellido_materno, $correo, $usuario, $contraseña, $telefono, $fecha_nacimiento, $rol) {
        $stmt = $this->db->prepare("CALL insertar_usuario(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $correo, $usuario, $contraseña, $telefono, $fecha_nacimiento, $rol]);
    }

    public function obtenerUsuariosPorRol($rol_usuario) {
        $stmt = $this->db->prepare("CALL obtener_usuarios_por_rol(?)");
        $stmt->execute([$rol_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
