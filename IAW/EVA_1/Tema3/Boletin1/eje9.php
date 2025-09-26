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
    9. Hacer un programa que convierta el valor numérico de un día de la semana
generado al azar en laborable (1-5) o fin de semana (6-7).
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $dia = rand(1,7);
      $numeroParaLista = $dia - 1;
      $listDia = array("lunes","martes","miércoles","jueves","viernes","sábado","domingo");


      Print "<p> El $listDia[$numeroParaLista] es <font color=\"red\">";

      if ($dia >= 1 and $dia <= 5){
        Print " dia laborable.";
      } else{
        Print "fin de semana.";
      }

      Print "</font></p>";
    ?>
</body>
</html>