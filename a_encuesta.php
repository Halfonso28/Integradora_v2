<?php
session_start();
require_once("Clases/Conexion.php");

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
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiiiiiii", $usuario_id, $pregunta_1, $pregunta_2, $pregunta_3, $pregunta_4, $pregunta_5, $pregunta_6, $pregunta_7, $pregunta_8, $pregunta_9, $pregunta_10, $pregunta_11, $pregunta_12, $pregunta_13, $pregunta_14, $pregunta_15);
    
    if ($stmt->execute()) {
        echo "Respuestas guardadas exitosamente!";
    } else {
        echo "Error: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>