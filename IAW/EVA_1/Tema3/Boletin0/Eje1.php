<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
    <!--  
    <link rel="stylesbeet" href"estilo.css">
    -->
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> 
      1. Asignar valores a dos variables numéricas y realizar con ellos las operaciones 
      de suma, resta, multiplicación y división, mostrando por pantalla el resultado de cada 
      una de las operaciones.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num1 = 5;
      $num2 = 7;

      $suma = $num1 + $num2;
      $resta = $num1 - $num2;
      $mult = $num1 * $num2;
      $div = $num1 / $num2;
      $mod = $num1 % $num2;

      //resulta
      echo "<p>la suma de $num1 + $num2 es $suma </p>";
      echo "<p>la resta de $num1 - $num2 es $resta </p>";
      echo "<p>la mult de $num1 * $num2 es $mult </p>";
      echo "<p>la div de $num1 / $num2 es $div </p>";
      echo "<p>la mod de $num1 % $num2 es $mod </p>";
    ?>
</body>
</html>