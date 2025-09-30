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
      3. Escribe un programa para averiguar si un número generado al azar (entre 1 y 100)
      es par o impar.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num = rand(1,100);

      if ($num % 2 == 1) {
        Print "$num es un numero impar.";
      } else {
        Print "$num es un numero par.";
      }


    ?>
</body>
</html>