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
    google.charts.load('current', {
      'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Pregunta 1', 'Calificación', ],
        <?php
        // Consulta SQL usando PDO
        $SQL = "SELECT * FROM `respuestas` WHERE pregunta_id = 1;";
        $stmt = $conexion->query($SQL);

        // Recorrer los resultados
        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
          // Generar las filas para el gráfico
          echo "['" . $resultado['id'] . "', " . $resultado['calificacion'] . "],";
        }
        ?>
      ]);

      var options = {
        chart: {
          title: 'Respuestas Pregunta 1',
          subtitle: 'Excelente = 4 , Bien = 3, Regular = 2, Mal = 1 arguments',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ['Pregunta 2', 'Calificación', ],
        <?php
        // Consulta SQL usando PDO
        $SQL = "SELECT * FROM `respuestas` WHERE pregunta_id = 2;";
        $stmt = $conexion->query($SQL);

        // Recorrer los resultados
        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
          // Generar las filas para el gráfico
          echo "['" . $resultado['id'] . "', " . $resultado['calificacion'] . "],";
        }
        ?>
      ]);

      var options = {
        chart: {
          title: 'Respuestas Pregunta 2',
          subtitle: 'Excelente = 4 , Bien = 3, Regular = 2, Mal = 1 arguments',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>

<body>
  <div id="columnchart_material" style="width: 500px; height: 300px;"></div>
  <div id="columnchart_material2" style="width: 500px; height: 300px;"></div>
</body>

</html>