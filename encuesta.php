<?php
session_start();
$_SESSION["ticket_id"]=$_GET["ticket_id"];
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
    <link rel="stylesheet" href="CSS/encuesta.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Encuesta</title>
</head>

<body>
    <a href="inicio.php"><i class="fa-solid fa-arrow-left"></i></a>
    <form action="a_encuesta.php" method="POST" id="formulario">
        <p class="formulario-titulo">Satisfaccion del Cliente</p>
        <p class="formulario-subtitulo">Lee y contesta correctamente la siguiente encuesta.</p>
        <!-- Pregunta 1 -->
        <!-- ¿Cómo calificarías la amabilidad del agente? -->
        <div class="formulario-grupo">
            <p for="pre-1" class="formulario-pre">1.- ¿Cómo calificarías la amabilidad del agente?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-1" value="4" id="pre-1-a" class="formulario-radio" checked>
                    <label for="pre-1-a" class="formulario-label">Excelente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-1" value="3" id="pre-1-b" class="formulario-radio">
                    <label for="pre-1-b" class="formulario-label">Muy Buena</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-1" value="2" id="pre-1-c" class="formulario-radio">
                    <label for="pre-1-c" class="formulario-label">Aceptable</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-1" value="1" id="pre-1-d" class="formulario-radio">
                    <label for="pre-1-d" class="formulario-label">Deficiente</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <!-- ¿El agente comprendió correctamente tu problema? -->
        <div class="formulario-grupo">
            <p for="pre-2" class="formulario-pre">2.- ¿El agente comprendió correctamente tu problema?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-2" value="4" id="pre-2-a" class="formulario-radio" checked>
                    <label for="pre-2-a" class="formulario-label">Perfectamente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-2" value="3" id="pre-2-b" class="formulario-radio">
                    <label for="pre-2-b" class="formulario-label">Bastante bien</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-2" value="2" id="pre-2-c" class="formulario-radio">
                    <label for="pre-2-c" class="formulario-label">Algo confuso</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-2" value="1" id="pre-2-d" class="formulario-radio">
                    <label for="pre-2-d" class="formulario-label">Poco claro</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <!-- ¿La explicación proporcionada fue clara? -->
        <div class="formulario-grupo">
            <p for="pre-3" class="formulario-pre">3.- ¿La explicación proporcionada fue clara?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-3" value="4" id="pre-3-a" class="formulario-radio" checked>
                    <label for="pre-3-a" class="formulario-label">Muy clara</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-3" value="3" id="pre-3-b" class="formulario-radio">
                    <label for="pre-3-b" class="formulario-label">Clara</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-3" value="2" id="pre-3-c" class="formulario-radio">
                    <label for="pre-3-c" class="formulario-label">Algo confusa</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-3" value="1" id="pre-3-d" class="formulario-radio">
                    <label for="pre-3-d" class="formulario-label">Poco clara</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 4 -->
        <!-- ¿El tiempo de respuesta fue adecuado? -->
        <div class="formulario-grupo">
            <p for="pre-4" class="formulario-pre">4.- ¿El tiempo de respuesta fue adecuado?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-4" value="4" id="pre-4-a" class="formulario-radio" checked>
                    <label for="pre-4-a" class="formulario-label">Muy rápido</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-4" value="3" id="pre-4-b" class="formulario-radio">
                    <label for="pre-4-b" class="formulario-label">Razonable</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-4" value="2" id="pre-4-c" class="formulario-radio">
                    <label for="pre-4-c" class="formulario-label">Lento</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-4" value="1" id="pre-4-d" class="formulario-radio">
                    <label for="pre-4-d" class="formulario-label">Muy lento</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 5 -->
        <!-- ¿Cómo calificarías la competencia técnica del agente? -->
        <div class="formulario-grupo">
            <p for="pre-5" class="formulario-pre">5.- ¿Cómo calificarías la competencia técnica del agente?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-5" value="4" id="pre-5-a" class="formulario-radio" checked>
                    <label for="pre-5-a" class="formulario-label">Excelente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-5" value="3" id="pre-5-b" class="formulario-radio">
                    <label for="pre-5-b" class="formulario-label">Muy Buena</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-5" value="2" id="pre-5-c" class="formulario-radio">
                    <label for="pre-5-c" class="formulario-label">Aceptable</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-5" value="1" id="pre-5-d" class="formulario-radio">
                    <label for="pre-5-d" class="formulario-label">Deficiente</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 6 -->
        <!-- ¿El agente mantuvo una actitud profesional durante la conversación? -->
        <div class="formulario-grupo">
            <p for="pre-6" class="formulario-pre">6.- ¿El agente mantuvo una actitud profesional durante la conversación?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-6" value="4" id="pre-6-a" class="formulario-radio" checked>
                    <label for="pre-6-a" class="formulario-label">
                        Totalmente profesional</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-6" value="3" id="pre-6-b" class="formulario-radio">
                    <label for="pre-6-b" class="formulario-label">Mayormente profesional</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-6" value="2" id="pre-6-c" class="formulario-radio">
                    <label for="pre-6-c" class="formulario-label">Algo profesional</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-6" value="1" id="pre-6-d" class="formulario-radio">
                    <label for="pre-6-d" class="formulario-label">Poco profesional</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <!-- ¿Recibiste la ayuda necesaria para resolver tu problema? -->
        <div class="formulario-grupo">
            <p for="pre-7" class="formulario-pre">7.- ¿Recibiste la ayuda necesaria para resolver tu problema?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-7" value="4" id="pre-7-a" class="formulario-radio" checked>
                    <label for="pre-7-a" class="formulario-label">Completamente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-7" value="3" id="pre-7-b" class="formulario-radio">
                    <label for="pre-7-b" class="formulario-label">En su mayoría</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-7" value="2" id="pre-7-c" class="formulario-radio">
                    <label for="pre-7-c" class="formulario-label">Algo</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-7" value="1" id="pre-7-d" class="formulario-radio">
                    <label for="pre-7-d" class="formulario-label">Poco</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 8 -->
        <!-- ¿El agente te proporcionó información adicional útil? -->
        <div class="formulario-grupo">
            <p for="pre-8" class="formulario-pre">8.- ¿El agente te proporcionó información adicional útil?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-8" value="4" id="pre-8-a" class="formulario-radio" checked>
                    <label for="pre-8-a" class="formulario-label">Mucha</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-8" value="3" id="pre-8-b" class="formulario-radio">
                    <label for="pre-8-b" class="formulario-label">Algo</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-8" value="2" id="pre-8-c" class="formulario-radio">
                    <label for="pre-8-c" class="formulario-label">Poca</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-8" value="1" id="pre-8-d" class="formulario-radio">
                    <label for="pre-8-d" class="formulario-label">Ninguna</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <!-- ¿El agente fue paciente al responder tus preguntas? -->
        <div class="formulario-grupo">
            <p for="pre-9" class="formulario-pre">9.- ¿El agente fue paciente al responder tus preguntas?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-9" value="4" id="pre-9-a" class="formulario-radio" checked>
                    <label for="pre-9-a" class="formulario-label">Muy paciente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-9" value="3" id="pre-9-b" class="formulario-radio">
                    <label for="pre-9-b" class="formulario-label">Paciente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-9" value="2" id="pre-9-c" class="formulario-radio">
                    <label for="pre-9-c" class="formulario-label">Algo impaciente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-9" value="1" id="pre-9-d" class="formulario-radio">
                    <label for="pre-9-d" class="formulario-label">Impaciente</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <!-- ¿El agente fue respetuoso en todo momento? -->
        <div class="formulario-grupo">
            <p for="pre-10" class="formulario-pre">10.- ¿El agente fue respetuoso en todo momento?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-10" value="4" id="pre-10-a" class="formulario-radio" checked>
                    <label for="pre-10-a" class="formulario-label">Totalmente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-10" value="3" id="pre-10-b" class="formulario-radio">
                    <label for="pre-10-b" class="formulario-label">Mayormente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-10" value="2" id="pre-10-c" class="formulario-radio">
                    <label for="pre-10-c" class="formulario-label">Algo</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-10" value="1" id="pre-10-d" class="formulario-radio">
                    <label for="pre-10-d" class="formulario-label">Poco</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 11 -->
        <!-- ¿La solución ofrecida resolvió el problema de forma definitiva? -->
        <div class="formulario-grupo">
            <p for="pre-11" class="formulario-pre">11.- ¿La solución ofrecida resolvió el problema de forma definitiva?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-11" value="4" id="pre-11-a" class="formulario-radio" checked>
                    <label for="pre-11-a" class="formulario-label">Completamente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-11" value="3" id="pre-11-b" class="formulario-radio">
                    <label for="pre-11-b" class="formulario-label">Mayormente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-11" value="2" id="pre-11-c" class="formulario-radio">
                    <label for="pre-11-c" class="formulario-label">Parcialmente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-11" value="1" id="pre-11-d" class="formulario-radio">
                    <label for="pre-11-d" class="formulario-label">No resolvió</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 12 -->
        <!-- ¿Cómo calificarías la actitud general del agente durante la asistencia? -->
        <div class="formulario-grupo">
            <p for="pre-12" class="formulario-pre">12.- ¿Cómo calificarías la actitud general del agente durante la asistencia?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-12" value="4" id="pre-12-a" class="formulario-radio" checked>
                    <label for="pre-12-a" class="formulario-label">Excelente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-12" value="3" id="pre-12-b" class="formulario-radio">
                    <label for="pre-12-b" class="formulario-label">Muy Buena</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-12" value="2" id="pre-12-c" class="formulario-radio">
                    <label for="pre-12-c" class="formulario-label">Aceptable</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-12" value="1" id="pre-12-d" class="formulario-radio">
                    <label for="pre-12-d" class="formulario-label">Deficiente</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 13 -->
        <!-- ¿El agente se comunicó de manera clara y comprensible? -->
        <div class="formulario-grupo">
            <p for="pre-13" class="formulario-pre">13.- ¿El agente se comunicó de manera clara y comprensible?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-13" value="4" id="pre-13-a" class="formulario-radio" checked>
                    <label for="pre-13-a" class="formulario-label">Muy clara y comprensible</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-13" value="3" id="pre-13-b" class="formulario-radio">
                    <label for="pre-13-b" class="formulario-label">Clara y comprensible</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-13" value="2" id="pre-13-c" class="formulario-radio">
                    <label for="pre-13-c" class="formulario-label">Algo clara y comprensible</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-13" value="1" id="pre-13-d" class="formulario-radio">
                    <label for="pre-13-d" class="formulario-label">Poco clara y comprensible</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 14 -->
        <!-- ¿La solución proporcionada se ajustó a tus expectativas? -->
        <div class="formulario-grupo">
            <p for="pre-14" class="formulario-pre">14.- ¿La solución proporcionada se ajustó a tus expectativas?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-14" value="4" id="pre-14-a" class="formulario-radio" checked>
                    <label for="pre-14-a" class="formulario-label">Superó las expectativas</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-14" value="3" id="pre-14-b" class="formulario-radio">
                    <label for="pre-14-b" class="formulario-label">Cumplió con las expectativas</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-14" value="2" id="pre-14-c" class="formulario-radio">
                    <label for="pre-14-c" class="formulario-label">Parcialmente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-14" value="1" id="pre-14-d" class="formulario-radio">
                    <label for="pre-14-d" class="formulario-label">No cumplió</label>
                </div>
            </div>
        </div>

        <!-- Pregunta 15 -->
        <!-- ¿La solución proporcionada se ajustó a tus expectativas? -->
        <div class="formulario-grupo">
            <p for="pre-15" class="formulario-pre">15.- ¿Cómo calificarías la habilidad del agente para resolver problemas complejos?<strong class="formulario-signo">*</strong></p>
            <div class="formulario-grupo-input">
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-15" value="4" id="pre-15-a" class="formulario-radio" checked>
                    <label for="pre-15-a" class="formulario-label">Excelente</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-15" value="3" id="pre-15-b" class="formulario-radio">
                    <label for="pre-15-b" class="formulario-label">Muy Buena</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-15" value="2" id="pre-15-c" class="formulario-radio">
                    <label for="pre-15-c" class="formulario-label">Aceptable</label>
                </div>
                <div class="formulario-grupo-radio">
                    <input type="radio" name="pre-15" value="1" id="pre-15-d" class="formulario-radio">
                    <label for="pre-15-d" class="formulario-label">Deficiente</label>
                </div>
            </div>
        </div>
        <button type="submit" class="formulario-btn-submit">Enviar</button>
    </form>
</body>

</html>