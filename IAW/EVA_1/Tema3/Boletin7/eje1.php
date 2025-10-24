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
   Ejercicio 1: Número, Cuadrado y Cubo 
      Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”. Carga el
      array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben almacenar los
      cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben almacenar los cubos de
      los valores que hay en “numero”. A continuación, muestra el contenido de los tres arrays dispuesto en tres
      columnas.
   </h2>
   <?php
      //variable
      $table = "";
      //Aqui empieza el programa
      for ($i=1;$i<=20;$i++){
         $numero[$i] = rand(0,100);
         $cuadrado[$i] = $numero[$i]**2;
         $cubo[$i] = pow($numero[$i],3);
         $table .= 
         "<tr>
               <td>".$i."º</td>
               <td>$numero[$i]</td>
               <td>$cuadrado[$i]</td>
               <td>$cubo[$i]</td>
         </tr>";
      }

      //resulta
      print "
      <table border=\"1\">
         <thead>
               <tr>
                  <th>i</th>
                  <th>numero</th>
                  <th>cuadrado</th>
                  <th>cubo</th>
               </tr>
         </thead>
         <tbody>
               $table
         </tbody>
      </table>
      ";
   ?>
</body>
</html>