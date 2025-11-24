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
   <h1>Boletin7. array</h1>
   <h2> 
   Ejercicio 2: Máximo y mínimo
      Escribe un programa que rellene un array con 10 números aleatorios y que luego muestre los números
      introducidos   junto   con   las   palabras   “máximo”   y   “mínimo”   al   lado   del   máximo   y   del   mínimo
      respectivamente. No se pueden usar las funciones max y min de php
</h2>
<?php
   //variable
   for ($i=0;$i<10;$i++){
         $numeros[$i] = rand(0,100);
   }

   $lenArray = count($numeros);
   $numMax = $numeros[0];
   $numMin = $numeros[0];
   //Aqui empieza el programa
   foreach($numeros as $numero){
         if ($numero > $numMax){
            $numMax = $numero;
         }
         if ($numero < $numMin){
            $numMin = $numero;
         }
   }
   //resulta
   print "
      <p> numero máximo: $numMax numero mínimo: $numMin </p>
   ";
   print"<pre>";
   print_r($numeros);
   print"</pre>";
    
  ?>
</body>
</html>