<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2>
    Tres personas deciden invertir su dinero para fundar un empresa. Cada una de
ellas invierte una cantidad distinta. Obtener el porcentaje que cada quien invierte
con respecto a la cantidad total invertida.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $cantidad1 = 234;
        $cantidad2 = 141;
        $cantidad3 = 960;

        $cantidadTotal = $cantidad1 + $cantidad2 + $cantidad3;

        $porcentaje1 = $cantidad1 / $cantidadTotal * 100;
        $porcentaje2 = $cantidad2 / $cantidadTotal * 100;
        $porcentaje3 = $cantidad3 / $cantidadTotal * 100;

      //resulta
        echo "
            <p>
              Han invertido $cantidadTotal mil euros<br>
              Primero señor ha invertido $cantidad1 mil euros que es ".round($porcentaje1,2)."% del total<br>
              Segundo señor ha invertido $cantidad2 mil euros que es ".round($porcentaje2,2)."% del total<br>
              Tercero señor ha invertido $cantidad3 mil euros que es ".round($porcentaje3,2)."% del total
            </p>
        ";

    ?>

</body>
</html>