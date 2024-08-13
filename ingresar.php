<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/79795cbd8e.js" crossorigin="anonymous"></script>
    <!-- Fin de Enlaces Externos -->
    <link rel="stylesheet" href="CSS/ingresar.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Iniciar Sesion</title>
</head>

<body>
    <nav class="container-fluid">
        <a href="index.php" class="nombre-pagina">VIAJERO DIGITAL</a>
        <div class="div-enlaces">
            <a href="index.php" class="nav-enlace nav-enlace-subrayado">Inicio</a>
            <button class="nav-boton">
                <a href="registro.php" id="btn-ingresar">Registrate Gratis</a>
            </button>
        </div>
    </nav>
    <form action="a_ingresar.php" method="POST" id="formulario">
        <p class="p-inicio">Bienvenido Viajero</p>
        <!-- Grupo Usuario -->
        <div class="formulario-grupo" id="grupo-usuario">
            <label for="usuario" class="formulario-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="formulario-input" placeholder="Usuario1234" required>
        </div>
        <!-- Grupo Contraseña -->
        <div class="formulario-grupo" id="grupo-contraseña">
            <label for="contraseña" class="formulario-label">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="formulario-input" placeholder="1234" required>
        </div>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["error"])){
                echo "<p class='error'><i class='fa-solid fa-circle-exclamation'></i> Usuario o contraseña incorrectos.</p>";
            }
        ?>
        <a href="" class="formulario-enlace">¿Olvidaste tu contraseña?</a>
        <button type="submit" class="btn-submit">Ingresar</button>
    </form>
    <!-- <img src="IMG/logo.png" alt="" class="img-logo"> -->
</body>
</html>