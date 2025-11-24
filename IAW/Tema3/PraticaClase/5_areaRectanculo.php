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
    <h1>Boletin5. funtion</h1>
    <h2> 
      calcura area de rectangulo
    </h2>
    <?php
      //funtion
      function calrec($a,$b){
         $area = $a * $b;
         return $area;
      };
      //Variables
      $altura = rand(1,99);
      $ancho = rand(1,99);

      //Aqui empieza el programa
      $areaRec = calrec($altura,$ancho);
      //resulta
      print "
      <p>
         altura = $altura;<br>
         ancho = $ancho;<br>
         area de rectangulo = $areaRec;<br>
      </p>
      ";
    ?>
</body>
</html>