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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pregunta', 'Promedio'],
<?php
        // Consulta SQL usando PDO
        $SQL = "SELECT 
    pregunta_id, 
    AVG(CAST(calificacion AS DECIMAL(10,2))) AS promedio_calificacion
FROM 
    respuestas
GROUP BY 
    pregunta_id;";
        $stmt = $conexion->query($SQL);
        
        // Recorrer los resultados
        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Asignar el nombre de la pregunta basado en el id de la pregunta
            $pregunta = 'Pregunta ' . $resultado['pregunta_id'];
            // Generar las filas para el gráfico
            echo "['".$pregunta."', ".$resultado['promedio_calificacion']."],";
        }
?>
        ]);

        var options = {
          chart: {
            title: 'Respuestas por Pregunta',
            subtitle: 'Excelente = 4 , Bien = 3, Regular = 2, Mal = 1',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 100%px; height: 100%;"></div>
  </body>
</html>