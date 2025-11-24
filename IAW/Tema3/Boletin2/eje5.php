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
    <h1>Boletin2.McLibre</h1>
    <h2>5 - Dado digital gráfico
    Escriba un programa que cada vez que se ejecute muestre un dibujo con una tirada de dado entre 1 y 6, al azar.    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num = rand(1,6);

      print "
        <img src = \".\\imagen\\$num.svg\">
      ";
    ?>
</body>
</html>