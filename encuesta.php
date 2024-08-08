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
    <link rel="stylesheet" href="CSS/encuesta.css">
    <link rel="stylesheet" href="CSS/fuentes.css">
    <link rel="icon" href="IMG/logo.png" type="image/x-icon">
    <title>Encuesta</title>
</head>

<body>
    <form action="" method="POST" id="formulario">
        
        <!-- Pregunta 1 -->
        <!-- ¿Cómo calificarías la amabilidad del agente? -->
        <div class="formulario-grupo">
            <p for="pre-1" class="formulario-pre">¿Cómo calificarías la amabilidad del agente?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-1" value="a" id="pre-1-a">
                <label for="pre-1-a" class="formulario-label">Excelente</label>
                <input type="radio" name="pre-1" value="b" id="pre-1-b">
                <label for="pre-1-b" class="formulario-label">Muy Buena</label>
                <input type="radio" name="pre-1" value="c" id="pre-1-c">
                <label for="pre-1-c" class="formulario-label">Aceptable</label>
                <input type="radio" name="pre-1" value="d" id="pre-1-d">
                <label for="pre-1-d" class="formulario-label">Deficiente</label>
            </div>
        </div>
        
        <!-- Pregunta 2 -->
        <!-- ¿El agente comprendió correctamente tu problema? -->
        <div class="formulario-grupo">
            <p for="pre-2" class="formulario-pre">¿El agente comprendió correctamente tu problema?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-2" value="a" id="pre-2-a">
                <label for="pre-2-a" class="formulario-label">Perfectamente</label>
                <input type="radio" name="pre-2" value="b" id="pre-2-b">
                <label for="pre-2-b" class="formulario-label">Bastante bien</label>
                <input type="radio" name="pre-2" value="c" id="pre-2-c">
                <label for="pre-2-c" class="formulario-label">Algo confuso</label>
                <input type="radio" name="pre-2" value="d" id="pre-2-d">
                <label for="pre-2-d" class="formulario-label">Poco claro</label>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <!-- ¿La explicación proporcionada fue clara? -->
        <div class="formulario-grupo">
            <p for="pre-3" class="formulario-pre">¿La explicación proporcionada fue clara?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-3" value="a" id="pre-3-a">
                <label for="pre-3-a" class="formulario-label">Muy clara</label>
                <input type="radio" name="pre-3" value="b" id="pre-3-b">
                <label for="pre-3-b" class="formulario-label">Clara</label>
                <input type="radio" name="pre-3" value="c" id="pre-3-c">
                <label for="pre-3-c" class="formulario-label">Algo confusa</label>
                <input type="radio" name="pre-3" value="d" id="pre-3-d">
                <label for="pre-3-d" class="formulario-label">Poco clara</label>
            </div>
        </div>

        <!-- Pregunta 4 -->
        <!-- ¿El tiempo de respuesta fue adecuado? -->
        <div class="formulario-grupo">
            <p for="pre-4" class="formulario-pre">¿El tiempo de respuesta fue adecuado?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-4" value="a" id="pre-4-a">
                <label for="pre-4-a" class="formulario-label">Muy rápido</label>
                <input type="radio" name="pre-4" value="b" id="pre-4-b">
                <label for="pre-4-b" class="formulario-label">Razonable</label>
                <input type="radio" name="pre-4" value="c" id="pre-4-c">
                <label for="pre-4-c" class="formulario-label">Lento</label>
                <input type="radio" name="pre-4" value="d" id="pre-4-d">
                <label for="pre-4-d" class="formulario-label">Muy lento</label>
            </div>
        </div>

        <!-- Pregunta 5 -->
        <!-- ¿Cómo calificarías la competencia técnica del agente? -->
        <div class="formulario-grupo">
            <p for="pre-5" class="formulario-pre">¿Cómo calificarías la competencia técnica del agente?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-5" value="a" id="pre-5-a">
                <label for="pre-5-a" class="formulario-label">Excelente</label>
                <input type="radio" name="pre-5" value="b" id="pre-5-b">
                <label for="pre-5-b" class="formulario-label">Muy Buena</label>
                <input type="radio" name="pre-5" value="c" id="pre-5-c">
                <label for="pre-5-c" class="formulario-label">Aceptable</label>
                <input type="radio" name="pre-5" value="d" id="pre-5-d">
                <label for="pre-5-d" class="formulario-label">Deficiente</label>
            </div>
        </div>
        
        <!-- Pregunta 6 -->
        <!-- ¿El agente mantuvo una actitud profesional durante la conversación? -->
        <div class="formulario-grupo">
            <p for="pre-6" class="formulario-pre">¿El agente mantuvo una actitud profesional durante la conversación?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-6" value="a" id="pre-6-a">
                <label for="pre-6-a" class="formulario-label">
                Totalmente profesional</label>
                <input type="radio" name="pre-6" value="b" id="pre-6-b">
                <label for="pre-6-b" class="formulario-label">Mayormente profesional</label>
                <input type="radio" name="pre-6" value="c" id="pre-6-c">
                <label for="pre-6-c" class="formulario-label">Algo profesional</label>
                <input type="radio" name="pre-6" value="d" id="pre-6-d">
                <label for="pre-6-d" class="formulario-label">Poco profesional</label>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <!-- ¿Recibiste la ayuda necesaria para resolver tu problema? -->
        <div class="formulario-grupo">
            <p for="pre-7" class="formulario-pre">¿Recibiste la ayuda necesaria para resolver tu problema?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-7" value="a" id="pre-7-a">
                <label for="pre-7-a" class="formulario-label">Completamente</label>
                <input type="radio" name="pre-7" value="b" id="pre-7-b">
                <label for="pre-7-b" class="formulario-label">En su mayoría</label>
                <input type="radio" name="pre-7" value="c" id="pre-7-c">
                <label for="pre-7-c" class="formulario-label">Algo</label>
                <input type="radio" name="pre-7" value="d" id="pre-7-d">
                <label for="pre-7-d" class="formulario-label">Poco</label>
            </div>
        </div>

        <!-- Pregunta 8 -->
        <!-- ¿El agente te proporcionó información adicional útil? -->
        <div class="formulario-grupo">
            <p for="pre-8" class="formulario-pre">¿El agente te proporcionó información adicional útil?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-8" value="a" id="pre-8-a">
                <label for="pre-8-a" class="formulario-label">Mucha</label>
                <input type="radio" name="pre-8" value="b" id="pre-8-b">
                <label for="pre-8-b" class="formulario-label">Algo</label>
                <input type="radio" name="pre-8" value="c" id="pre-8-c">
                <label for="pre-8-c" class="formulario-label">Poca</label>
                <input type="radio" name="pre-8" value="d" id="pre-8-d">
                <label for="pre-8-d" class="formulario-label">Ninguna</label>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <!-- ¿El agente fue paciente al responder tus preguntas? -->
        <div class="formulario-grupo">
            <p for="pre-9" class="formulario-pre">¿El agente fue paciente al responder tus preguntas?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-9" value="a" id="pre-9-a">
                <label for="pre-9-a" class="formulario-label">Muy paciente</label>
                <input type="radio" name="pre-9" value="b" id="pre-9-b">
                <label for="pre-9-b" class="formulario-label">Paciente</label>
                <input type="radio" name="pre-9" value="c" id="pre-9-c">
                <label for="pre-9-c" class="formulario-label">Algo impaciente</label>
                <input type="radio" name="pre-9" value="d" id="pre-9-d">
                <label for="pre-9-d" class="formulario-label">Impaciente</label>
            </div>
        </div>
        
        <!-- Pregunta 10 -->
        <!-- ¿El agente fue respetuoso en todo momento? -->
        <div class="formulario-grupo">
            <p for="pre-10" class="formulario-pre">¿El agente fue respetuoso en todo momento?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-10" value="a" id="pre-10-a">
                <label for="pre-10-a" class="formulario-label">Totalmente</label>
                <input type="radio" name="pre-10" value="b" id="pre-10-b">
                <label for="pre-10-b" class="formulario-label">Mayormente</label>
                <input type="radio" name="pre-10" value="c" id="pre-10-c">
                <label for="pre-10-c" class="formulario-label">Algo</label>
                <input type="radio" name="pre-10" value="d" id="pre-10-d">
                <label for="pre-10-d" class="formulario-label">Poco</label>
            </div>
        </div>
        
        <!-- Pregunta 11 -->
        <!-- ¿La solución ofrecida resolvió el problema de forma definitiva? -->
        <div class="formulario-grupo">
            <p for="pre-11" class="formulario-pre">¿La solución ofrecida resolvió el problema de forma definitiva?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-11" value="a" id="pre-11-a">
                <label for="pre-11-a" class="formulario-label">Completamente</label>
                <input type="radio" name="pre-11" value="b" id="pre-11-b">
                <label for="pre-11-b" class="formulario-label">Mayormente</label>
                <input type="radio" name="pre-11" value="c" id="pre-11-c">
                <label for="pre-11-c" class="formulario-label">Parcialmente</label>
                <input type="radio" name="pre-11" value="d" id="pre-11-d">
                <label for="pre-11-d" class="formulario-label">No resolvió</label>
            </div>
        </div>
        
        <!-- Pregunta 12 -->
        <!-- ¿Cómo calificarías la actitud general del agente durante la asistencia? -->
        <div class="formulario-grupo">
            <p for="pre-12" class="formulario-pre">¿Cómo calificarías la actitud general del agente durante la asistencia?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-12" value="a" id="pre-12-a">
                <label for="pre-12-a" class="formulario-label">Excelente</label>
                <input type="radio" name="pre-12" value="b" id="pre-12-b">
                <label for="pre-12-b" class="formulario-label">Muy Buena</label>
                <input type="radio" name="pre-12" value="c" id="pre-12-c">
                <label for="pre-12-c" class="formulario-label">Aceptable</label>
                <input type="radio" name="pre-12" value="d" id="pre-12-d">
                <label for="pre-12-d" class="formulario-label">Deficiente</label>
            </div>
        </div>
        
        <!-- Pregunta 13 -->
        <!-- ¿El agente se comunicó de manera clara y comprensible? -->
        <div class="formulario-grupo">
            <p for="pre-13" class="formulario-pre">¿El agente se comunicó de manera clara y comprensible?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-13" value="a" id="pre-13-a">
                <label for="pre-13-a" class="formulario-label">Muy clara y comprensible</label>
                <input type="radio" name="pre-13" value="b" id="pre-13-b">
                <label for="pre-13-b" class="formulario-label">Clara y comprensible</label>
                <input type="radio" name="pre-13" value="c" id="pre-13-c">
                <label for="pre-13-c" class="formulario-label">Algo clara y comprensible</label>
                <input type="radio" name="pre-13" value="d" id="pre-13-d">
                <label for="pre-13-d" class="formulario-label">Poco clara y comprensible</label>
            </div>
        </div>
        
        <!-- Pregunta 14 -->
        <!-- ¿La solución proporcionada se ajustó a tus expectativas? -->
        <div class="formulario-grupo">
            <p for="pre-14" class="formulario-pre">¿La solución proporcionada se ajustó a tus expectativas?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-14" value="a" id="pre-14-a">
                <label for="pre-14-a" class="formulario-label">Superó las expectativas</label>
                <input type="radio" name="pre-14" value="b" id="pre-14-b">
                <label for="pre-14-b" class="formulario-label">Cumplió con las expectativas</label>
                <input type="radio" name="pre-14" value="c" id="pre-14-c">
                <label for="pre-14-c" class="formulario-label">Parcialmente</label>
                <input type="radio" name="pre-14" value="d" id="pre-14-d">
                <label for="pre-14-d" class="formulario-label">No cumplió</label>
            </div>
        </div>

        <!-- Pregunta 15 -->
        <!-- ¿La solución proporcionada se ajustó a tus expectativas? -->
        <div class="formulario-grupo">
            <p for="pre-15" class="formulario-pre">¿Cómo calificarías la habilidad del agente para resolver problemas complejos?</p>
            <div class="formulario-grupo-input">
                <input type="radio" name="pre-15" value="a" id="pre-15-a">
                <label for="pre-15-a" class="formulario-label">Excelente</label>
                <input type="radio" name="pre-15" value="b" id="pre-15-b">
                <label for="pre-15-b" class="formulario-label">Muy Buena</label>
                <input type="radio" name="pre-15" value="c" id="pre-15-c">
                <label for="pre-15-c" class="formulario-label">Aceptable</label>
                <input type="radio" name="pre-15" value="d" id="pre-15-d">
                <label for="pre-15-d" class="formulario-label">Deficiente</label>
            </div>
        </div>
    </form>
</body>

</html>