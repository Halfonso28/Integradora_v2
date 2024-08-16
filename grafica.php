<?php
require_once("Clases/Conexion.php");

// Instanciar la clase Conexion
$conexionObj = new Conexion();
$conexion = $conexionObj->getConexion();
?>

<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
        // Consulta SQL usando PDO
        $SQL = "SELECT * FROM respuestas";
        $stmt = $conexion->query($SQL);
        
        // Recorrer los resultados
        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Generar las filas para el gráfico
            echo "['".$resultado['id']."', ".$resultado['calificacion']."],";
        }
?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
