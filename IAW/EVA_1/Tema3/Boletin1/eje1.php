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
    <h1>Boletin 1. If y Switch</h1>
    <h2> 
      1. Realizar un programa para averiguar si alguien puede conducir a partir de los
      valores de dos variables $edad y $tieneCarnet.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $edad = rand(11,25);
      $tieneCarnet = rand(0,1);

      Print "<p>Datos: <br> 
                Edad: $edad <br> 
                Tiene carnet: ";
      if ($tieneCarnet and $edad < 18){
        Print " null ";
      }elseif($tieneCarnet){
        Print " si ";
      }else{
        Print " no ";
      }
      Print "</p>";

      if ($edad >= 18 and $tieneCarnet){
        print "Esta persona que tiene carnet y ya es mayor edad. Puede conducir.";
      }elseif ($edad >= 18){
        print "Esta persona que es mayor edad pero no tiene carnet entonces no puede conducir.";
      }else{
        print"Este chico o chica no se puede conducir.";
      }


    ?>
</body>
</html>