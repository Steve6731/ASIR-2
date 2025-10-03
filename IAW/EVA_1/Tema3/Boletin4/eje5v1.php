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
    5. Realiza un programa que muestre los números impares entre 1 y 100, calculando para cada uno 
de ellos si es impar o no. (1 es impar, 2 no es impar,.....)
    </h2>
    <?php
    //Variables
    $text = "";
    $num = 1;

    //Aqui empieza el programa
    while ($num <= 100){
      if ($num%2 == 0){
        $text = $text.strval($num)." no es impar<br>";
      }else{
        $text = $text.strval($num)." es impar<br>";
      }
      $num++;
    }

    //resulta
    print "
    <p>
      $text
    </p>
    ";
    ?>
</body>
</html>