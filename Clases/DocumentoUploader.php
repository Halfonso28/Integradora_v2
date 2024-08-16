<?php
include 'Conexion.php';

class DocumentoUploader {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    public function subirDocumento($archivo, $idTicket, $descripcion) {
        $nombreDocumento = $archivo['name'];
        $rutaDestino = 'C:/xampp/htdocs/Integradora_v2/documentos/' . basename($nombreDocumento);

        if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
            $stmt = $this->db->prepare("INSERT INTO ticket (id, descripcion, nombre_documento, url_documento) VALUES (:id, :descripcion, :nombreDocumento, :rutaDestino)");
            $stmt->bindParam(':id', $idTicket);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':nombreDocumento', $nombreDocumento);
            $stmt->bindParam(':rutaDestino', $rutaDestino);

            return $stmt->execute();
        } else {
            return false;
        }
    }
}
?>