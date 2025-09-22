<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> Un maestro desea saber que porcentaje de hombres y que porcentaje de
    mujeres hay en un grupo de estudiantes a partir del número de cada uno de ellos.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $cantidadHomre = 23;
        $cantidadMujer = 14;

        $cantidadTotal = $cantidadHomre + $cantidadMujer;

        $porcentajeHombre = $cantidadHomre / $cantidadTotal * 100;
        $porcentajeMujer = $cantidadMujer / $cantidadTotal * 100;

      //resulta
        echo "
            <p>
              El clase hay total $cantidadTotal persona<br>
              Hay $cantidadHomre hombres que es ".round($porcentajeHombre,2)."% del clase<br>
              Hay $cantidadMujer mujeres que es ".round($porcentajeMujer,2)."% del clase
            </p>
        ";

    ?>

</body>
</html>