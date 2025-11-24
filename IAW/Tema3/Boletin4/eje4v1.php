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
    <h1>Boletin4. While, do..while y For</h1>
    <h2> 
    4. Hacer una página que muestre por pantalla todos los divisores (aquellos cuyo resto de la división 
    es 0) de un número generado al azar entre 1 y 100. Ej: Divisores del 16: 1, 2, 4, 8, 16.
    </h2>
    <?php
    //Variables
    $text = "1";
    $num = rand(1,100);
    $i_num = 2;

    //Aqui empieza el programa
    while ($i_num <= $num){
      if ($num%$i_num == 0){
        $text = $text.", ".strval($i_num);
      }
      $i_num++;
    }

    //resulta
    print "
    <p>
      Numero: $num <br>
      Divisores: $text
    </p>
    ";
    ?>
</body>
</html>