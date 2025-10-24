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
   Ejercicio 8: Clasificación de Películas por Género<br/>
      Crea un array asociativo donde las claves sean géneros de películas (ej: 'Comedia', 'Drama', 'Acción') y los 
      valores sean arrays indexados con los títulos de varias películas de ese género.
      Ejemplo de estructura:<br/>
      PHP<br/>
      $peliculas = [<br/>
         'Acción' => ['John Wick', 'Vengadores: Endgame', 'Misión Imposible'],<br/>
         'Comedia' => ['Atrapado en el tiempo', 'La vida de Brian'],<br/>
         'Drama' => ['Forrest Gump', 'La lista de Schindler', 'El Padrino']<br/>
      ];<br/>
      1.Utiliza un bucle foreach para recorrer el array principal ($peliculas). La clave será el género y el valor
      será el array de títulos.<br/>
      2. Dentro del bucle, imprime el nombre del género como un encabezado (por ejemplo: "Películas de 
      Acción:").<br/>
      3. Utiliza un segundo bucle (anidado) para recorrer el array de títulos e imprimirlos como una lista.
      Ejemplo de salida:<br/>
      **Películas de Acción:**<br/>
      - John Wick<br/>
      - Vengadores: Endgame<br/>
      - Misión Imposible<br/>
      **Películas de Comedia:**<br/>
      - Atrapado en el tiempo<br/>
      - La vida de Brian<br/>
      ..
  </h2>
  <?php
    //variable
      $peliculas = [
        'Acción' => ['John Wick', 'Vengadores: Endgame', 'Misión Imposible'],
        'Comedia' => ['Atrapado en el tiempo', 'La vida de Brian'],
        'Drama' => ['Forrest Gump', 'La lista de Schindler', 'El Padrino']
      ];

    //Aqui empieza el programa
      echo "<ul>";
    foreach ($peliculas as $autor=>$peliculas){
      echo "<li>Película de $autor<ol>";
      foreach ($peliculas as $pelicula){
         echo "<li> $pelicula </li>";
      }
      echo "</ol></li>";
    }
      echo "</ul>"
  ?>
</body>
</html>