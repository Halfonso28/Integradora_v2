<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/79795cbd8e.js" crossorigin="anonymous"></script>
    <!-- Fin de Enlaces Externos -->
    <link rel="stylesheet" href="CSS/registro.css">
    <!-- Fuentes -->
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Registro Usuario</title>
</head>

<body>
    <nav class="container-fluid">
        <a href="index.php" class="nombre-pagina">VIAJERO DIGITAL</a>
        <div class="div-enlaces">
            <a href="index.php" class="nav-enlace nav-enlace-subrayado">Inicio</a>
            <button class="nav-boton">
                <a href="ingresar.php" id="btn-ingresar">Iniciar Sesión</a>
            </button>
        </div>
    </nav>
    <!-- <i class="fa-solid fa-check"></i>
    <i class="fa-solid fa-xmark"></i> -->
    <form action="" method="POST" class="container-fluid" id="formulario">
        <p class="p-inicio">¡Bienvenido a Viajero Digital!</p>
        <p class="p-instrucciones">Por favor, completa el registro para disfrutar de los beneficios de Viajero Digital.</p>
        <!-- Grupo Nombre -->
        <div class="formulario-grupo" id="grupo-nombre">
            <label for="nombre" class="formulario-label">Nombre</label>
            <div class="formulario-grupo-input">
                <input type="text" name="nombre" id="nombre" class="formulario-input" placeholder="Ingresa tu nombre" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El nombre solo puede contener letras y espacios.</p>
        </div>
        <!-- Grupo Apellido Paterno -->
        <div class="formulario-grupo" id="grupo-apellidoPaterno">
            <label for="apellidoPaterno" class="formulario-label">Apellido Paterno</label>
            <div class="formulario-grupo-input">
                <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="formulario-input" placeholder="Ingresa tu apellido paterno" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El apellido paterno solo puede contener letras y espacios.</p>
        </div>
        <!-- Grupo Apellido Materno -->
        <div class="formulario-grupo" id="grupo-apellidoMaterno">
            <label for="apellidoMaterno" class="formulario-label">Apellido Materno</label>
            <div class="formulario-grupo-input">
                <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="formulario-input" placeholder="Ingresa tu apellido materno" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El apellido paterno solo puede contener letras y espacios.</p>
        </div>
        <!-- Grupo Usuario -->
        <div class="formulario-grupo" id="grupo-usuario">
            <label for="usuario" class="formulario-label">Usuario</label>
            <div class="formulario-grupo-input">
                <input type="text" name="usuario" id="usuario" class="formulario-input" placeholder="Ingresa un nombre de usuario" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El usuario debe de ser de 4 a 16 caracteres y solo puede contener numeros, letras y guion bajo.</p>
        </div>
        <!-- Grupo Contraseña -->
        <div class="formulario-grupo" id="grupo-contraseña">
            <label for="contraseña" class="formulario-label">Contraseña</label>
            <div class="formulario-grupo-input">
                <input type="password" name="contraseña" id="contraseña" class="formulario-input" placeholder="1234" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">La contraseña tiene que ser de 4 a 12 caracteres.</p>
        </div>
        <!-- Grupo Contraseña 2 -->
        <div class="formulario-grupo" id="grupo-contraseña2">
            <label for="contraseña2" class="formulario-label">Confirma tu contraseña</label>
            <div class="formulario-grupo-input">
                <input type="password" name="contraseña2" id="contraseña2" class="formulario-input" placeholder="1234" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">Las contraseñas no coinciden.</p>
        </div>
        <!-- Grupo Correo -->
        <div class="formulario-grupo" id="grupo-correo">
            <label for="correo" class="formulario-label">Correo</label>
            <div class="formulario-grupo-input">
                <input type="email" name="correo" id="correo" class="formulario-input" placeholder="correo@correo.com" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>
        <!-- Grupo Telefono -->
        <div class="formulario-grupo" id="grupo-telefono">
            <label for="telefono" class="formulario-label">Teléfono</label>
            <div class="formulario-grupo-input">
                <input type="tel" name="telefono" id="telefono" class="formulario-input" pattern="[0-9]{10}" placeholder="Ingresa tu teléfono" required>
                <i class="fa-solid fa-check formulario-estado-validacion"></i>
            </div>
            <p class="formulario-input-error">El telefono debe tener 10 digitos.</p>
        </div>
        <!-- Grupo Fecha de Nacimiento -->
        <div class="formulario-grupo" id="grupo-fechaNacimiento">
            <label for="fechaNacimiento" class="formulario-label">Fecha de Nacimiento</label>
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="formulario-input" required>
        </div>
        <!-- Grupo Terminos y Condiciones -->
        <div class="formulario-grupo" id="grupo-terminos">
            <input type="checkbox" name="terminos" id="terminos" class="formulario-input" value="si" required>
            <label for="terminos" class="formulario-label label-checkbox">Aceptar teminos y condiciones.</label>
        </div>
        <button type="submit" id="btn-registrarse">Registrarse</button>
    </form>
    <script src="JS/registro.js"></script>
</body>

</html>