<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> Calcular la cantidad de segundos que están incluidos en el número de horas,
    minutos y segundos ingresados por el usuario.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $hora = 50;
        $minuto = 56;
        $segundo = 23;

        $minutoTotal = $hora * 60 + $minuto;
        $segundoTotal = $minutoTotal * 60 + $segundo;

      //resulta
        echo "
            <p>$hora horas y $minuto minutos y $segundo segundo es igual que $segundoTotal segundos</p>
        ";

    ?>

</body>
</html>