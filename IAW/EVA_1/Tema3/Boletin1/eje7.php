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
    <h1>Boletin 7. If y Switch</h1>
    <h2> 
    7. Hacer un programa que para una nota aleatoria almacenada en una variable
muestre por pantalla si se trata de un suspenso, aprobado, bien, notable,
sobresaliente, nota no válida.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $nota = rand(-1,10);
      print "<p>Nota: $nota ==> ";

      if($nota < 0){
        print " nota no válida";
      }elseif ($nota < 5){
        print " suspenso.";
      }elseif($nota < 6){
        print " aprobado.";
      }elseif($nota < 9){
        print " bien.";
      }elseif($nota < 10){
        print " notable.";
      }elseif($nota == 10){
        print " sobresaliente.";
      }else{
        print " nota no válida";
      }

      print "</p>";
    ?>
</body>
</html>