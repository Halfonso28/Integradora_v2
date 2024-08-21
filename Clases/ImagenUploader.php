<?php
// include 'Conexion.php';

// class ImagenUploader {
//     private $db;

//     public function __construct() {
//         $conexion = new Conexion();
//         $this->db = $conexion->getConexion();
//     }

//     public function subirImagen($archivo, $idTicket, $descripcion) {
//         $nombreImagen = $archivo['name'];
//         $rutaDestino = 'imagenes/' . basename($nombreImagen);

//         if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
//             $stmt = $this->db->prepare("INSERT INTO ticket (id, descripcion, nombre_img, url_img) VALUES (:id, :descripcion, :nombreImagen, :rutaDestino)");
//             $stmt->bindParam(':id', $idTicket);
//             $stmt->bindParam(':descripcion', $descripcion);
//             $stmt->bindParam(':nombreImagen', $nombreImagen);
//             $stmt->bindParam(':rutaDestino', $rutaDestino);

//             return $stmt->execute();
//         } else {
//             return false;
//         }
//     }
// }
?>