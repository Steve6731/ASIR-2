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
   Ejercicio 3: Rotación de valores
      Escribe un programa que genere 15 números aleatorios y que los almacene en un array. Rota los elementos
      de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número
      que se encuentra en la última posición debe pasar a la posición 0. Finalmente, muestra el contenido del
      array. No se pueden usar las funciones de arrrays de php.
   </h2>
   <?php
      //funtion
      //creo un funcion para enseña la array como tabla.
      function ArrayToTr($array){
         $tr = "<tr>";
         foreach($array as $i=>$num){
            $tr .="<td>$num</td>";
         }
         $tr .= "</tr>";

         return $tr;
      };

      //variable
      for ($i=0;$i<15;$i++){
         $numeros[$i] = rand(0,100);
      }
      $lenArray = count($numeros);

      //Aqui empieza el programa
      // primero voy guardar el array antes que cambiarlo
      $trOriginal = ArrayToTr($numeros);
      //empieza cambiar
      for ($i=$lenArray;$i>0;$i--){
         $numeros[$i] = $numeros[$i-1];
      }
      $numeros[0] = $numeros[$lenArray];
      unset($numeros[$lenArray]);

      // ahora tengo que guardar el resulta
      $trRotado = ArrayToTr($numeros);

      //resulta
      print"
         <table border = \"1\">
            <thead>
            <tr>
               <th>0</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th>
            </tr>
            </thead>
            <tbody>
            $trOriginal
            $trRotado
            </tbody>
         </table>
      ";
   ?>
</body>
</html>