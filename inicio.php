<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/79795cbd8e.js" crossorigin="anonymous"></script>
    <!-- Fin de Enlaces Externos -->
    <link rel="stylesheet" href="CSS/inicio.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Inicio</title>
</head>

<body>

    <?php
    switch ($_SESSION["rol"]) {
        case "usuario":
    ?>
            <nav>
                <div class="contendor-menu">
                    <a href="#" class="nombre-pagina">VIAJERO DIGITAL</a>
                    <a href="inicio.php" class="nav-enlace nav-enlace-seleccionado">Inicio</i></a>
                    <div class="contendor-submenu">
                        <p class="nav-enlace">Reportes <i class="fa-solid fa-caret-down"></i></p>
                        <div class="submenu">
                            <a href="crear_reporte.php" class="nav-enlace-submenu">Crear</a>
                            <a href="historial_ticked.php" class="nav-enlace-submenu">Historial</a>
                        </div>
                    </div>
                    <a href="historial_ticked.php" class="nav-enlace">Encuesta</a>
                </div>
                <div class="div-enlaces">
                    <a href="#" class="nav-enlace nav-enlace-subrayado"><?php echo json_decode($_SESSION["usuario"]); ?></a>
                    <button class="nav-boton">
                        <a href="salir.php" class="nav-boton-a">Salir <i class="fa-solid fa-right-from-bracket"></i></a>
                    </button>
                </div>
            </nav>

            <section class="row" id="seccion-opciones">

                <!-- Grupo Reportes -->
                <div class="col-md-4 col-sm-12 seccion-grupo">
                    <img src="IMG/persona-laptop.jpg" alt="" class="seccion-imagen">
                    <strong class="seccion-parrafo">¿Tuviste problemas con tu viaje?</strong>
                    <p class="seccion-parrafo">Aqui te ayudamos a resolverlo. Genera un reporte dónde especifique lo que paso.</p>
                    <button class="seccion-boton"><a href="crear_reporte.php" class="seccion-boton-a">Clic Aqui <i class="fa-solid fa-arrow-pointer"></i></a></button>
                </div>

                <!-- Grupo Encuesta -->
                <div class="col-md-4 col-sm-12 seccion-grupo">
                    <img src="IMG/encuesta.jpg" alt="" class="seccion-imagen">
                    <strong class="seccion-parrafo">Satisfacción del cliente</strong>
                    <p class="seccion-parrafo">Completa un pequeña encuesta donde nos digas como fue el servicio de resolución de problemas.</p>
                    <button class="seccion-boton"><a href="historial_ticked.php" class="seccion-boton-a">Clic Aqui <i class="fa-solid fa-arrow-pointer"></i></a></button>
                </div>
            </section>
        <?php
            break;

        // SOPORTE--------------------------------------------------- 
            
        case "soporte":
        ?>
            <nav>
                <div class="contendor-menu">
                    <a href="#" class="nombre-pagina">VIAJERO DIGITAL</a>
                    <a href="inicio.php" class="nav-enlace nav-enlace-seleccionado">Inicio</i></a>
                    <div class="contendor-submenu">
                        <p class="nav-enlace">Reportes <i class="fa-solid fa-caret-down"></i></p>
                        <div class="submenu">
                            <a href="historial_ticked.php" class="nav-enlace-submenu">Historial</a>
                        </div>
                    </div>
                    <a href="grafica.php" class="nav-enlace">Graficas</a>
                </div>
                <div class="div-enlaces">
                    <a href="#" class="nav-enlace nav-enlace-subrayado"><?php echo json_decode($_SESSION["usuario"]); ?></a>
                    <button class="nav-boton">
                        <a href="salir.php" class="nav-boton-a">Salir <i class="fa-solid fa-right-from-bracket"></i></a>
                    </button>
                </div>
            </nav>

            <section class="row" id="seccion-opciones">
                <!-- Grupo Reportes -->
                <div class="col-md-4 col-sm-12 seccion-grupo">
                    <img src="IMG/persona-laptop.jpg" alt="" class="seccion-imagen">
                    <strong class="seccion-parrafo">Reportes</strong>
                    <p class="seccion-parrafo">Accede a los reportes recientes relacionados con los viajes. Aquí podrás revisar en detalle todos los informes generados para los viajes realizados.</p>
                    <button class="seccion-boton"><a href="historial_ticked.php" class="seccion-boton-a">Clic Aqui <i class="fa-solid fa-arrow-pointer"></i></a></button>
                </div>
                
                <!-- Grupo Encuesta -->
                <div class="col-md-4 col-sm-12 seccion-grupo">
                    <img src="IMG/encuesta.jpg" alt="" class="seccion-imagen">
                    <strong class="seccion-parrafo">Graficas</strong>
                    <p class="seccion-parrafo">Accede a un análisis detallado de las calificaciones proporcionadas por los usuarios en sus reportes de viajes. </p>
                    <button class="seccion-boton"><a href="grafica.php" class="seccion-boton-a">Clic Aqui <i class="fa-solid fa-arrow-pointer"></i></a></button>
                </div>
            </section>
    <?php
            break;
    }
    ?>







</body>

</html>

<!-- www.freepik.es 
 
Foto de <a href="https://unsplash.com/es/@charlesdeluvio?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">charlesdeluvio</a> en <a href="https://unsplash.com/es/fotos/persona-que-usa-macbok-DgoyKNgPiFQ?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
  -->