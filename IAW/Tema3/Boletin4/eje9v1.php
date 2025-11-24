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
    9. Hacer un programa que muestre una figura similar a la siguiente. NOTA: solo está permitido el 
    uso de un @ en todo el códig
    </h2>
    <?php
      //Variables
      $tamanio = rand(4,16);
      $i_altura = 1;
      $i_ancho = 1;
      $text = "";

      //Aqui empieza el programa
      while ($i_altura <= $tamanio){
        $i_ancho = 1;
        while ($i_ancho <= $i_altura){
          $text = $text."@";
          $i_ancho++;
        }
        $text = $text."<br>";
        $i_altura++;
      }

      //resulta
      print "
      <p>
        Tamaño: $tamanio <br>
        $text
      </p>
      ";
    ?>
</body>
</html>