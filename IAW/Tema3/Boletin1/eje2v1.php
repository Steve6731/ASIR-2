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
      2. Escribe un programa que a partir de un número entre -100 y 100 diga si es positivo
      o negativo
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num = rand(-100,100);

      if ($num > 0) {
        Print "$num es un numero positivo.";
      } elseif ($num < 0){
        Print "$num es un numero negativo.";
      } else {
        Print "$num es un 0";
      }


    ?>
</body>
</html>