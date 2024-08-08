<?php

class VistasUsuario {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function obtenerUsuariosPorRol($rol_usuario) {
        $stmt = $this->db->prepare("SELECT * FROM vista_usuarios_por_rol WHERE rol = ?");
        $stmt->execute([$rol_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
