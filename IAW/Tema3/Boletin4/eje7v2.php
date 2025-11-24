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
    7. Realiza el producto de dos números distintos de 0 utilizando únicamente la operación de suma.
    </h2>
    <?php
      //Variables
      $num1 = rand(1,9);
      $num2 = rand(1,9);
      $suma = 0;

      //Aqui empieza el programa
      for ($i=1;$i<=$num1;$i++){
        $suma = $suma + $num2;
      }

      //resulta
      print "
      <p>
        Hay $num1 y $num2, el producto de estos numeros es $suma 
      </p>
      ";
    ?>
</body>
</html>