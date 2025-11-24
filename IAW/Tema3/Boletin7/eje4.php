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
   Ejercicio 4: Suma de Gastos Mensuales
      Crea un array indexado que contenga los gastos de los primeros 6 meses del año (por ejemplo: 850, 1200, 
      950, 780, 1100, 990).
      1.Utiliza un bucle for para recorrer el array.
      2. Calcula y muestra la suma total de los gastos.
      3. Calcula y muestra el promedio de gastos del semestre.
   </h2>
   <?php
      //variable
      $gastos = [850,1200,950,780,1100,990];
      $lenArray = count($gastos);
      $suma = 0;
      $li = "";

      //Aqui empieza el programa

      for ($i=0;$i<$lenArray;$i++){
         $suma += $gastos[$i];
         $li .= "<li>$gastos[$i]</li>";
      }
      $promedio = round($suma/$lenArray,2);

      //resulta
      print"
         <p>promedio: $promedio suma: $suma</p>
         <p>Gastos de cada mes:</p>
         <ol>
            $li
         </ol>
      ";
   ?>
</body>
</html>