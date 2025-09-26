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
    <h1>Boletin 1. If y Switch</h1>
    <h2> 
    4. Escriba un comparador de tres números indicando si los tres números son iguales,
    si hay dos iguales o si los tres son distintos.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num1 = rand(1,3);
      $num2 = rand(1,3);
      $num3 = rand(1,3);
      $contador = 0;

      Print "<p>Num1 = $num1</p>";
      Print "<p>Num2 = $num2</p>";
      Print "<p>Num3 = $num3</p>";

      if ($num1 == $num2){
        $contador++;
      }
      if ($num1 == $num3){
        $contador++;
      }
      if ($num2 == $num3){
        $contador++;
      }
      
      if ($contador == 1){
        Print "<p>Hay 2 numeros son iguales.</p>";
      } elseif ($contador == 3){
        Print "<p>Hay 3 numeros son iguales.</p>";
      }else {
        Print "<p>No hay numeros iguales.</p>";
      }
    ?>
</body>
</html>