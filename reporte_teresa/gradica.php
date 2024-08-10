<?php
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto si es necesario
$password = ""; // Cambia esto si es necesario
$dbname = "integradora"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar datos
$sql = "SELECT calificacion, COUNT(*) as cantidad FROM respuestas GROUP BY calificacion";
$result = $conn->query($sql);

$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['calificacion'];
        $data[] = $row['cantidad'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfica de Calificaciones</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Cantidad de Respuestas por Calificación',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
