<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> Un alumno desea saber cuál será su calificación final en la materia de
IAW. Dicha calificación se compone de los siguientes porcentajes:<br>
• 55% del promedio de sus tres calificaciones parciales.<br>
• 30% de la calificación del examen final.<br>
• 15% de la calificación de un trabajo final. <br>
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $notaMedioParciales = 8;
        $notaExamenFinal = 9;
        $notaTrabajoFinal = 7;

        $notaFinal = 0.55 * $notaMedioParciales + 
                     0.3 * $notaExamenFinal + 
                     0.15 * $notaTrabajoFinal;
      
      //resulta
        echo "<p>EL promedio de sus tres calificaciones parciales: $notaMedioParciales</p>";
        echo "<p>La calificación del examen final: $notaExamenFinal</p>";
        echo "<p>La calificación de un trabajo final: $notaTrabajoFinal</p>";
        echo "<p>La calificación final: $notaFinal</p>";

    ?>

</body>
</html>