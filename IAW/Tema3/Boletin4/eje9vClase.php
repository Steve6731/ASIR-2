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
uso de un @ en todo el código
    </h2>
    <?php
      //Variables
      $tamanio = rand(4,16);
      
      
      $text = "";

      //Aqui empieza el programa
      for ($i_altura=$tamanio;$i_altura>=1;$i_altura=$i_altura-1){
        $i_ancho = 1;
        for ($i_ancho=1;$i_ancho<=$i_altura;$i_ancho++){
          $text = $text."@";
        }
        $text = $text."<br>";
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