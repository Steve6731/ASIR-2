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
    Hacer un Programa que calcule longitudes de Circunferencia.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        define("PI",3.1415926);
        $radio = 3;

        $perimetro = 2 * $radio* PI;
      
      //resulta
        echo "El circulo que tiene un radio de $radio cm, tiene $perimetro cm perimetro";
    ?>
</body>
</html>