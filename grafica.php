<?php
require_once("Clases/Conexion.php");
session_start();
// Instanciar la clase Conexion
$conexionObj = new Conexion();
$conexion = $conexionObj->getConexion();
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/79795cbd8e.js" crossorigin="anonymous"></script>
  <!-- Fin de Enlaces Externos -->
  <link rel="stylesheet" href="CSS/grafica.css">
  <link rel="stylesheet" href="CSS/fuentes.css">
  <link rel="icon" href="IMG/logo.png" type="image/x-icon">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['bar']
    });
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
          echo "['" . $pregunta . "', " . $resultado['promedio_calificacion'] . "],";
        }
        ?>
      ]);

      var options = {
        chart: {
          title: 'Promedio de Preguntas',
          subtitle: 'Perfecto = 4 , Bien = 3, Puede Mejorar = 2, Necesita Mejorar = 1',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>

<body>
  <nav>
    <div class="contendor-menu">
      <a href="index.php" class="nombre-pagina">VIAJERO DIGITAL</a>
      <a href="inicio.php" class="nav-enlace">Inicio</i></a>
      <div class="contendor-submenu">
        <p class="nav-enlace">Reportes <i class="fa-solid fa-caret-down"></i></p>
        <div class="submenu">
          <a href="historial_ticked.php" class="nav-enlace-submenu">Historial</a>
        </div>
      </div>
      <a href="grafica.php" class="nav-enlace nav-enlace-seleccionado">Graficas</a>
    </div>
    <div class="div-enlaces">
      <a href="#" class="nav-enlace nav-enlace-subrayado"><?php echo json_decode($_SESSION["usuario"]); ?></a>
      <button class="nav-boton">
        <a href="salir.php" class="nav-boton-a">Salir <i class="fa-solid fa-right-from-bracket"></i></a>
      </button>
    </div>
  </nav>
  <div id="columnchart_material" class="grafica"></div>
   
</body>

</html>