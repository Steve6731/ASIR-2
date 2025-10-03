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
    6. Escribe un programa que devuelva la suma de todos los números entre dos números aleatorios, y 
además diga cuántos números hay. Ejemplo: entre 2 y 6 hay 3 números y la suma es: 12
    </h2>
    <?php
      //Variables
      // como en ejemplo no incluye dos numeros aleatorios en suma y contar
      // entonces voy menos uno el numero mayor y suma uno el numero menor para quitar dos numeros aleatorios. 
      $num1 = rand(1,100);
      $num2 = rand(1,100);
      $numMax = -1;
      $numMin = 1;
      $suma = 0;


      
      //Aqui empieza el programa
      //determina quien es mayor
      if ($num1 > $num2){
        $numMax = $num1 + $numMax;
        $numMin = $num2 + $numMin;
      }else{
        $numMax = $num2 + $numMax;
        $numMin = $num1 + $numMin;
      }

      $countNum = $numMax - $numMin;
      

      for ($i=$numMin;$i<=$numMax;$i++){
        $suma = $suma + $i;
      }

      //resulta
      print "
      <p>
        Entre $num1 y $num2 hay $countNum números y la suma es: $suma
      </p>
      ";
    ?>
</body>
</html>