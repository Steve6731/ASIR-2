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
    <h2>7 - Saludo
    Escriba un programa que cada vez que se ejecute muestre un saludo a un tamaño elegido al azar entre 200% y 800%.
    <?php
      //Aqui empieza el programa

      //Variables
      $num = rand(2,8);
      print "
      <table border=\"5\" style=\"border-collapse:collapse;\">
        <thead>
          <tr>
            <th><font style=\"font-size:".$num."em\">¡Hola!</font></th>
          </tr>
        </thead>
      </table>
    ";
    ?>
</body>
</html>