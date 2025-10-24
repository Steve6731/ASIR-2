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
   Ejercicio 5: Lista de Amigos<br/>
      Crea un array indexado con una lista de 5 nombres de amigos.<br/>
      1.Utiliza un bucle foreach para recorrer el array.<br/>
      2. Dentro del bucle, imprime un saludo personalizado para cada amigo, por ejemplo: "¡Hola, [nombre
            del amigo]!  ".👋<br/>
      Ejemplo de salida:<br/>
      ¡Hola, Ana! 👋<br/>
      ¡Hola, Carlos! 👋<br/>
      ...

   </h2>
   <?php
      //variable
      $nombres = ["Ana","Carlos","Juan","Jose","Manuel","Sonia"];

      //Aqui empieza el programa

      foreach ($nombres as $nombre){
         print"<p>¡Hola, $nombre 👋!</p>";
      }
   ?>
</body>
</html>