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
    <h2> 8 - Emoticono
    Escriba un programa que cada vez que se ejecute muestre un emoticono elegido al azar entre los caracteres Unicode 128512 y 128586. Puede consultar la lista de emoticonos en los apuntes de HTML/CSS.
    <?php
      //Aqui empieza el programa

      //Variables
      $num = rand(128512,128586);
      print "
        <p><font size=\"8\">&#$num</font></p>
    ";
    ?>
</body>
</html>