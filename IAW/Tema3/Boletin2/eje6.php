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
    <h2>6 - Código de color
    Escriba un programa que cada vez que se ejecute muestre un código de color RGB elegido al azar. El código de color puede tener el formato rgb(rojo verde azul), donde rojo, verde y azul son números enteros entre 0 y 255.    <?php
      //Aqui empieza el programa

      //Variables
      $col1 = rand(0,255);
      $col2 = rand(0,255);
      $col3 = rand(0,255);

      print "<p style=\"background-color:rgb($col1 $col2 $col3)\">Color: rgb($col1 $col2 $col3)</p>";
    ?>
</body>
</html>