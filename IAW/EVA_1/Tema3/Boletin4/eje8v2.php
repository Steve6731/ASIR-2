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
    8. Realiza la división entera de dos números distintos de 0 utilizando únicamente restas.
    </h2>
    <?php
      //Variables
      $num1 = rand(1,99);
      $num2 = rand(1,9);
      $division = 0;

      //Aqui empieza el programa
      for ($resto=$num1;$resto>=$num2;$resto=$resto-$num2){
        $division++;
      }

      //resulta
      print "
      <p>
        $num1 / $num2 = $division resto: $resto
      </p>
      ";
    ?>
</body>
</html>