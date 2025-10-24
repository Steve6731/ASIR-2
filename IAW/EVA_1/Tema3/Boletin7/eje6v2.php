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
   Ejercicio 6: Información del Estudiante<br/>
   Crea un array asociativo que almacene la información de un estudiante. Las claves deben ser nombre, edad,<br/>
   curso y asignaturas. El valor de asignaturas debe ser, a su vez, un array indexado con al menos 3 asignaturas <br/>
   (por ejemplo: 'Matemáticas', 'Historia', 'Física').<br/>
   1.Utiliza un bucle foreach para recorrer la información principal del estudiante (nombre, edad y curso)<br/>
   e imprimirla en formato clave: valor.<br/>
   2.Luego, utiliza otro bucle (for o foreach) para imprimir la lista de asignaturas.<br/>
   Ejemplo de salida:<br/>
   Nombre: Juan Pérez<br/>
   Edad: 20<br/>
   Curso: 3º de Informática<br/>
   Asignaturas:<br/>
      - Matemáticas<br/>
      - Historia<br/>
      - Física<br/>
   </h2>
   <?php
   //variable
   $alumno = [
      "Nombre" => "Juan Pérez",
      "Edad" => 20,
      "Curso" => "3º de Informática",
      "Asignaturas" => ['Matemáticas', 'Historia', 'Física']
   ];

   //Aqui empieza el programa

   echo"<ul>";
   foreach ($alumno as $clave=>$valor){
      if (is_array($valor)) {
         echo"<li>$clave: </li><ul>";
         foreach ($valor as $asignatura){
         echo"<li> $asignatura </li>";
         }
         echo"</ul>";
      }else{
         echo"<li>$clave: $valor </li>";
      }
   }

   echo"</ul>";
   ?>
</body>
</html>